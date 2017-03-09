<?php
header('Content-Type: text/plain');
date_default_timezone_set('Europe/Paris');

require('functions.php');

require("ICal/ICal.php");
require("ICal/EventObject.php");

use ICal\ICal;

function customCIAutoload($classname){
  if(file_exists($file = './class/'.$classname . '.class.php')){
    require $file;
  }
}

spl_autoload_register('customCIAutoload');

$send = false;

$colors = ["#FF5C5C","#DEDB2E","#4799C8","#A27AD9","#2CA258","#E3B028","#1FC9AB","#773F3F","#B25998","#8BBA39","#594A7B"];
$nbcolors = count($colors);

$db = DBFactory::getMysqlConnexionWithPDO();
$universitymanager = new UniversityManager($db);
$grademanager = new GradeManager($db);
$groupmanager = new GroupManager($db);

if(isset($_GET["university"]) && isset($_GET["grade"]) && isset($_GET["group"])){
    $_POST["university"] = $_GET["university"];
    $_POST["grade"] = $_GET["grade"];
    $_POST["group"] = $_GET["group"];
}

$forceReload = true;

$resultList = [];

if(!empty($_POST["university"]) && !empty($_POST["grade"]) && !empty($_POST["group"])){

    $actualUniversity = $_POST["university"];
    $actualGrade = $_POST["grade"];

    $university = $universitymanager->getUnique($actualUniversity);
    $grade = $grademanager->getUnique($actualGrade);

    $actualGroup = explode(",",$_POST["group"]);

    //$resourceDB = $database[$actualUniversity]["niv"][$actualGrade]["groups"];

    $ct = 0;

    foreach($groupmanager->getListByGradeId($actualGrade) as $group){
        if(in_array(strval($group->id()), $actualGroup)){

            $folder = "./cache/".$actualUniversity."/".$actualGrade;
            $filename = $folder."/".$group->id().".txt";
            $filenameMatieres = $folder."/".$group->type()."-matieres.txt";
            if(!is_dir($folder)){
                mkdir($folder, 0777, true);
            }
            $matieres = [];
            if(file_exists($filenameMatieres)){
                $matieres = json_decode(file_get_contents($filenameMatieres), true);
            }

            $filetime = time() - @filemtime($filename);

            if(!file_exists($filename)){
                file_put_contents($filename, "");
                chmod($filename, 0777);
            }
            if($filetime >= 60 || isset($_GET["debug"])){ // La ressource n'existe pas, ou a expiré
                try{
                    $colormat = $grade->colorBySubject();

                    if($group->custom()){
                        // On appelle l'URL custom
                        $callurl = $group->url();
                    }
                    else{
                        // On appelle ADE
                        $callurl = generateUrl($university->url(), $group->calid());
                    }
                    $filenameTmp = strval($group->id())."-".sha1(rand()).".txt";
                    $icscontent = @file_get_contents($callurl);
                    if($icscontent === false){
                        throw new Exception('Le calendrier est inaccessible.');
                    }
                    file_put_contents($filenameTmp, $icscontent);
                    $ical = new ICal($filenameTmp);
                    unlink($filenameTmp);

                    $eventsR = [];
                    $events = $ical->sortEventsWithOrder($ical->events());
                    foreach($events as $event){ 
                        if($colormat){ // couleur différentes par événements
                            if(!isset($matieres[$event->summary])){ // la matière n'est pas encore associée à une couleur
                                $matieres[$event->summary] = $colors[$ct % $nbcolors];
                                $ct++;
                            }
                            $color = $matieres[$event->summary];
                        }
                        else{
                            $color = $group->color();
                        }

                        $start = $ical->iCalDateToUnixTimestamp($event->dtstart);
                        $end = $ical->iCalDateToUnixTimestamp($event->dtend);
                        $duration = $end - $start;

                        $evt = [];
                        $evt["title"] = str_replace('\\', '', $event->summary);
                        if($duration == 86400 || $duration == 0){
                            $evt["allDay"] = true;
                        }
                        else{
                            $evt["allDay"] = false;
                        }
                        $evt["start"] = date('c', $start);
                        $evt["end"] = date('c', $end);
                        $evt["description"] = preg_replace('/^(?:<br\s*\/?>\s*)+/', '', str_replace("\\n", "<br>", str_replace('\\,', '', $event->description)));

                        if(isset($resource["url"])){
                            $evt["description"] .= "<br>Exporté le " . date("d/m/Y à H:i");
                        }
                        $evt["location"] = $event->location;
                        $evt["backgroundColor"] = $color;
                        $evt["borderColor"] = $color;
                        $eventsR[] = $evt;
                    }

                    file_put_contents($filename, json_encode($eventsR, JSON_PRETTY_PRINT));

                    // Stockage matières
                    file_put_contents($filenameMatieres, json_encode($matieres, JSON_PRETTY_PRINT));

                        
                }
                catch(Exception $e){
                }
            }

            $events = json_decode(file_get_contents($filename));
            foreach($events as $event){
                $resultList[] = $event;
            }
        }
    }
}

echo(json_encode($resultList, JSON_PRETTY_PRINT));

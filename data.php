<?php 
header('Access-Control-Allow-Origin: *');  
header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set("Europe/Paris");

require('functions.php');

function customCIAutoload($classname){
  if(file_exists($file = './class/'.$classname . '.class.php')){
    require $file;
  }
}

function printArrayJSON($array){
    global $send;
    if($array)
        echo json_encode($array, JSON_PRETTY_PRINT);
    else
        echo json_encode([]);

    $send = true;
}

spl_autoload_register('customCIAutoload');

$send = false;

$db = DBFactory::getMysqlConnexionWithPDO();
$universitymanager = new UniversityManager($db);
$grademanager = new GradeManager($db);
$groupmanager = new GroupManager($db);

if(isset($_GET["action"])){
    $action = $_GET["action"];

    switch($action){
        case "getUniversityList":
            printArrayJSON($universitymanager->getList(true));
            break;
        case "getUniversity":
            if(isset($_GET["code"])){
                printArrayJSON($universitymanager->getUnique($_GET["code"], true));
            }
            break;
        case "getGradeList":
            if(isset($_GET["code"])){
                printArrayJSON($grademanager->getListByUniversityCode($_GET["code"], true));
            }
            break;
        case "getGrade":
            if(isset($_GET["id"])){
                printArrayJSON($grademanager->getUnique($_GET["id"], true));
            }
            break;
        case "getGroupList":
            if(isset($_GET["id"])){
                printArrayJSON($groupmanager->getListBygradeId($_GET["id"], true));
            }
            break;
        case "getGroup":
            if(isset($_GET["id"])){
                printArrayJSON($groupmanager->getUnique($_GET["id"], true));
            }
            break;
        case "generateUrl":
            if(isset($_GET["university"]) && isset($_GET["grouplist"])){
                $url = $universitymanager->getUnique($_GET["university"])->url();
                printArrayJSON(["url" => generateUrl($url, $_GET["grouplist"])]);
            }
        default: 
    } 
}

if(!$send){
    printArrayJSON([]);
}

 ?>
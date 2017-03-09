<?php 

function customCIAutoload($classname){
  if(file_exists($file = './class/'.$classname . '.class.php')){
    require $file;
  }
}

spl_autoload_register('customCIAutoload');

$db = DBFactory::getMysqlConnexionWithPDO();
$grademanager = new GradeManager($db);

$titre = "TimeCalendar - Consultez votre emploi du temps universitaire";
if(isset($_GET["p"])){
    $page = $_GET["p"];
    switch($page){
        case "calendar":
            if(isset($_GET["grade"])){
                $grade = $grademanager->getUnique($_GET["grade"]);
                if($grade){
                    $titre = $grade->name() . " - TimeCalendar";
                }
            }
        break;
        case "about";
            $titre = "A propos - TimeCalendar";
        break;
    }
}
else{
    $page = "index";
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Outil vous permettant de consulter votre emploi du temps universitaire, et d'importer votre planning dans votre application de calendrier préférée.">
    <meta name="author" content="Samuel Prak">
    <meta name="image" content="http://www.samuelprak.fr/timecalendar/img/logo2.png">
    <link rel="icon" href="./img/favicon.png">

    <meta property="og:title" content="TimeCalendar">
    <meta property="og:site_name" content="TimeCalendar">
    <meta property="og:description" content="Outil vous permettant de consulter votre emploi du temps universitaire, et d'importer votre planning dans votre application de calendrier préférée.">
    <meta property="og:image" content="http://www.samuelprak.fr/timecalendar/img/logo2.png">
    <meta property="og:url" content="http://www.samuelprak.fr/timecalendar/">
    <meta property="og:type" content="website">

    <link rel="image_src" type="image/png" href="http://www.samuelprak.fr/timecalendar/img/logo2.png" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="TimeCalendar">
    <meta name="twitter:site" content="@SamuelNLC">
    <meta name="twitter:description" content="Outil vous permettant de consulter votre emploi du temps universitaire, et d'importer votre planning dans votre application de calendrier préférée.">
    <meta name="twitter:image" content="http://www.samuelprak.fr/timecalendar/img/logo2.png">


    <title><?php echo $titre; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-select.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.print.css" rel="stylesheet" media="print">
    <script src="https://use.fontawesome.com/093774acdf.js"></script>
    <script src="./js/js.cookie.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="./css/app/global.css" rel="stylesheet">
    <link href="./css/app/fullcalendar.css" rel="stylesheet">
    <!-- Base de données    -->
    <script type="text/javascript" src="./js/database.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TimeCalendar</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li<?php if($page == "index"){ echo(' class="active"'); } ?>><a href="index.php">Accueil</a></li>
                    <li<?php if($page == "calendar"){ echo(' class="active"'); } ?>><a href="index.php?p=calendar">Calendrier</a></li>
                    <li<?php if($page == "about"){ echo(' class="active"'); } ?>><a href="index.php?p=about">A propos</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container<?php if($page == "calendar") {echo '-fluid'; } ?> first-container">

        <?php

        if(file_exists("./pages/".$page.".php")){
            include("./pages/".$page.".php");
        }
        else{
            include("./pages/error.php");
        }
        ?>
    </div><!-- /.container -->
    <footer class="footer">
        <hr>
        <div class="container">
            <p>Site réalisé par <a href="http://www.samuelprak.fr/" target="_blank">Samuel Prak</a> - <a href="https://github.com/Herasus/TimeCalendar" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a></p>
        </div>
    </footer>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88135025-2', 'auto');
        ga('send', 'pageview');

    </script>


    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap-select.min.js"></script>
    <script src="./js/underscore.min.js"></script>
    <script src="./js/moment.js"></script>
    <script src="./js/ical.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.1/fullcalendar.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

</body>
</html>

<?php
    include_once 'lib/session.php';
    Session::init();
?>
<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
    spl_autoload_register(function ($class) {
        include_once "classes/" . $class . ".php";
    });
?>
<?php
    $c = $_GET["page"] ?? "home";
    $a = $_GET["action"] ?? "homescreen";
    $controllerName = ucfirst($c) . "Controller"; //HomeController
    require "controller/" . $controllerName . ".php";
    $controller = new $controllerName(); //new HomeController();
    $controller->$a(); //$controller->home();
?>

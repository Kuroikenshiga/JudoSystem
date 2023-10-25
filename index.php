<?php

    $class = !isset($_GET["class"]) && !isset($_GET["method"])?"Main":$_GET["class"];
    $method = !isset($_GET["method"]) && !isset($_GET["class"]) ?"showCad":$_GET["method"];

    $class .= "Controller";
    require_once("JudoSystem/controller/$class.php");
    $nowIsController = new $class();
    $nowIsController->$method();


?>
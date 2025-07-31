<?php
session_start();



$router = isset($_GET["router"]) ? $_GET["router"] : null;


require_once "./client/Controller/HomeController.php";
require_once "./client/Controller/UserController.php";


switch ($router) {

    // User
    case 'login':
        $login = new UserController();
        $login->login();
        break;

    case 'register':
        $register = new UserController();
        $register->register();
        break;

    case 'update':
        $update = new UserController();
        $update->update();
        break;

    default:
        $home = new HomeController();
        $home->home();
        break;
}
?>
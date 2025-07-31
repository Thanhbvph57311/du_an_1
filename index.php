<?php
session_start();

$router = isset($_GET["router"]) ? $_GET["router"] : null;


require_once "./client/Controller/HomeController.php";


switch ($router) {
    default:
        $home = new HomeController();
        $home->home();
}
?>
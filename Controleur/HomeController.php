<?php
class HomeController {
    public function index() {
        require_once 'Vue/header/header.php';
        require_once 'Vue/home.php';
    }
}
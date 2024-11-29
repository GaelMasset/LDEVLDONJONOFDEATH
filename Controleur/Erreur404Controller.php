<?php
class Erreur404Controller {
    public function index() {
        require_once realpath($_SERVER["DOCUMENT_ROOT"]) . "/LDEVLDONJONOFDEATH/Vue/erreurs/error_404.php";
    }
}
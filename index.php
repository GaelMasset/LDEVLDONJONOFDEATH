

<style>
    <?php require_once 'styles/header.css';?>
</style>



<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'autoload.php';

class Router
{
    
    private $routes = [];
    private $prefix;

    public function __construct($prefix = '')
    {
        $this->prefix = trim($prefix, '/');
    }

    public function addRoute($uri, $controllerMethod)
    {
        $this->routes[trim($uri, '/')] = $controllerMethod;
    }

    public function route($url)
    {
        // Suppression du préfixe du début de l'URL
        if ($this->prefix && strpos($url, $this->prefix) === 0) {
            $url = substr($url, strlen($this->prefix) + 1);
        }
        // Suppression des barres obliques en trop
        $url = trim($url, '/');
        // Vérification de la correspondance de l'URL à une route définie
        if (array_key_exists($url, $this->routes)) {
            // Extraction du nom du contrôleur et de la méthode
            list($controllerName, $methodName) = explode('@', $this->routes[$url]);

            // Instanciation du contrôleur et appel de la méthode
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            // Gestion des erreurs (page 404, etc.)
            $controller = new Erreur404Controller();
            $controller->index();
        }
    }
}

// Instanciation du routeur
$router = new Router('LDEVLDONJONOFDEATH');

// Ajout des routes
$router->addRoute('', 'HomeController@index'); // Pour la racine


$router->addRoute('profile', 'profileController@index');
$router->addRoute('traitementConnexion', 'traitementConnexionController@index');
$router->addRoute('traitementInscription', 'traitementInscriptionController@index');
$router->addRoute('modifProfile', 'modifProfileController@index');
$router->addRoute('panelAdmin', 'PanelAdminController@index');
$router->addRoute('login', 'inscriptionController@index');
$router->addRoute('ajouterItem', 'AddItemController@index');
$router->addRoute('ajouterItemTraitement', 'AddItemTraitementController@index');
$router->addRoute('ajouterLoot', 'AddLootController@index');
$router->addRoute('ajouterLootTraitement', 'AddLootTraitementController@index');
$router->addRoute('ajouterMonstre', 'AddMonsterController@index');
$router->addRoute('ajouterMonstreTraitement', 'AddMonsterTraitementController@index');
$router->addRoute('supprimerJoueur', 'RemovePlayerController@index');


for($i = 1; $i < 3; $i++){
    $router->addRoute('chapter'.$i, 'ChapterController@index'.$i); // Pour le chapitre i
}


// Appel de la méthode route

$router->route(trim($_SERVER['REQUEST_URI'], '/'));

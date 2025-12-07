<?php 

class Router{
  public function dispatch($url)
  {
    
    $url = trim($url, '/');
    $url = explode('/', $url);
 
    if(empty($url[0])){
      $url[0] = 'User';
    }
 
    // défini le nom du controller
    $controllerName = ucfirst($url[0]) . 'Controller';
 
   
    if(isset($url[1])){
      $methodName = $url[1];
    }
    else{ // si aucun parametre, findAll par defaut
      $methodName = 'findAll';
    }
    
    // extrait la suite de l'URL
    $params = array_slice($url, 2);
 
    // vérification de l'existence du contrôleur
    if (file_exists("./app/controllers/$controllerName.php")) {
      // charge le controleur
      require_once "./app/controllers/$controllerName.php";
      // initialise le controleur
      $controller = new $controllerName;
 
      if (method_exists($controller, $methodName)) {
        // appel la méthode du controleur et envoie les paramètres
        call_user_func_array([$controller, $methodName], $params);
      } else {
        die('<p>Méthode introuvable</p>');
      }
    } else {
      die('<p>Controleur introuvable</p>');
    }
  }
}
<?php 

trait Render{
  public function renderView(string $view, array $data = [], string $layout = 'layout')
  {
    // extraction des données en tant que variables
    
    extract($data);
    // chemin accès à la vue
    $viewPath = __DIR__ .'/../views/'. $view .'.php';
    
    if (file_exists($viewPath)) {
      
      ob_start();
      // on appel la vue
      require_once $viewPath;
      $content = ob_get_clean();
      require_once __DIR__ .'/../views/'. $layout .'.php';
    }
    else {
      die('<p>404</p>');
    }
  }
}
<?php

class Router{
  private $routes = [];   // festgelegte Routes speichern

  public function add($method, $path, $controllerAction){   // Routen ins leere Array einspeichern ($routes)
    $this->routes[$method][$path] = $controllerAction;
  }

  // Hauptfunktion - Route wurde aufgerufen - Controller muss aufgeladen werden und die Funktion davon
  public function dispatch(){
    $method = $_SERVER["REQUEST_METHOD"];
    $path = $_SERVER["REQUEST_URI"];

    // prüfen, welche Route aufgerufen wurde und ob diese existiert
    foreach ($this->routes[$method] ?? [] as $route => $controllerAction) {
      if(preg_match($this->formatRoute($route), $path, $matches)){
        array_shift($matches);
        list($class, $action) = explode("@", $controllerAction);
        if(class_exists($class) && method_exists($class, $action)){
          return call_user_func_array([new $class, $action], array_slice($matches, 1));
        }
      }
    }
    http_response_code(404);
    echo "404 Not Found";
  }

  // Routenparameter extrahieren  routes/{id}/test --> {id} wird formatiert
private function formatRoute($route){
  $route = preg_replace('/\{([^\/]+)\}/', '(?P<$1>[^/]+)', $route);
  return "#^$route$#";
}
}
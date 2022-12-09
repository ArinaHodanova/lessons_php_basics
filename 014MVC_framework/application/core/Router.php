<?
namespace application\core;

class Router 
{
  protected $routes = [];
  protected $params = [];
  
  public function __construct() 
  {
    $arr = require 'application/config/routes.php';
    foreach($arr as $key => $value) 
    {
      $this->add($key, $value);
    }
  }

  //добавление маршрута
  public function add($route, $params) 
  {
    $route = '#^'.$route.'$#';
    $this->routes[$route] = $params;
  }

  //проверяем есть ли такой маршрута
  public function match() 
  {
    $url = trim($_SERVER['REQUEST_URI'], '/');//получаем текущий url
    foreach($this->routes as $route => $params) { 
      if(preg_match($route, $url, $matches)) 
      {
        $this->params = $params;
        return true;
      } 
    }
    return false;
  }

  //запуск роутера
  public function run() 
  {
    if($this->match()) 
    {
        $path = 'application\controllers\\' . ucfirst($this->params['controller']). 'Controller';
        if(class_exists($path)) 
        {
          $action = $this->params['action'].'Action';
          if(method_exists($path, $action)) 
          {
              $controller = new $path($this->params);
              $controller->$action();
          } else {
              echo 'Не найден контроллер '.$path;
          }
        } else
        {
          echo 'Контроллер не найден '.$path;
        }
    } else {
        echo 'Маршрут не найден';
    }
  }
}
?>

<?
namespace application\core;

use application\core\View;

abstract class Controller
{
  public $route;
  public $view;
  public $model;

  public function __construct($route) 
  {
    $this->route = $route;
    $this->view = new View($route);
    $this->model = $this->loadModel($this->route['controller']);

  }

  public function loadModel($name)
  {
    $path = 'application\models\\'.ucfirst($name);
    if(class_exists($path)) 
    {
      return new $path();
    } else 
    {
      echo 'Модель не найдена';
    }
  }
}
?>

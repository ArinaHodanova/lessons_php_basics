<?
namespace application\core;

class View
{
  public $route;
  public $path;//путь к виду
  public $layout ='defaulte';//шаблон

  public function __construct($route) 
  {
    $this->route = $route;
    $this->path = $route['controller'].'/'.$route['action'];
    
    echo '<b>sdvsdv';
    debug($this->path);
    echo '</b>';
  }
}
?>

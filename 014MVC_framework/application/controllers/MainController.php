<?
namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
  public function indexAction() 
  {
    $rezult = $this->model->getNews();
    //переносим результат в вид
    $vars = [
      'news' =>  $rezult,
    ];
    $this->view->render('Главная страница', $vars);
  }

}
?>

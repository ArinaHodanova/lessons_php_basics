<?
class Input {
  public static function exists($type = 'post') {
    switch($type) {
      case 'post':
        return (!empty($_POST)) ? true : false;
      case 'get':
        return (!empty($_GET)) ? true : false;
      default:
        return false;
      break;
    }
  }  

  public static function get($item) {
    if(isset($_POST[$item])) {
        return trim(htmlspecialchars($_POST[$item]));
    } else if(isset($_GET[$item])) {
        return trim(htmlspecialchars($_GET[$item]));
    }
    return '';
  }
}
?>

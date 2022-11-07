<?
class Connect {
  private static $pdo;

  public static function make() {
    //подключение к БД
    try {
      self::$pdo = new PDO('mysql:host=localhost;dbname=users_db', 'root', 'root');
    } catch(PDOException $exception) {
      die($exception->getMessage());
    }
    return self::$pdo;
  }
}
?>

<?
class Connect {
  private static $pdo;

  public static function make($config) {
    //подключение к БД
    try {
      self::$pdo = new PDO("{$config['connect']};dbname={$config['db']};charset={$config['charset']}", 
          "{$config['username']}", 
          "{$config['password']}"
      );
    } catch(PDOException $exception) {
      die($exception->getMessage());
    }
    return self::$pdo;
  }
}
?>

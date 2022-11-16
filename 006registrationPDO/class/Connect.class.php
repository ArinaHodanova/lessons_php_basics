<?
class Connect {
  private static $pdo;
  
  public static function make($config) {
    try {
      self::$pdo = new PDO("{$config['connect']};dbname={$config['db']}", "{$config['username']}", "{$config['password']}");
    } catch(PDOException $exception) {
      die($exception->getMessage());
    }
    return self::$pdo;
  }
}
?>

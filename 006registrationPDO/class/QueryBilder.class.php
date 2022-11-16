<?
class QueryBilder {
  protected $pdo;
  private $rezult = null;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
    return $pdo;
  }

  public function getOneUser($table, $data) {
    $keys = array_keys($data);
    foreach ($keys  as $key => $value) {
      $str .= $value . ' = :' . $value;
    }
    $keys = rtrim($str, ',');
    $stat = $this->pdo->prepare("SELECT * FROM `$table` WHERE {$keys}");
    $stat->execute($data);
    $this->rezult = $stat->fetch(PDO::FETCH_ASSOC);
    return $this;
  }
}
?>

<?
class QueryBilder {
  protected $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
    return $pdo;
  }

  public function getAll($table) {
    //запрос
    $stat = $this->pdo->prepare("SELECT * FROM {$table}");
    $stat->execute();
    return $stat->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>

<?
class QueryBilder {
  protected $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
    return $pdo;
  }

  public function getAll() {
    $stat = $this->pdo->prepare('SELECT * FROM `posts`');
    $stat->execute();
    $posts = $stat->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
  }
}

?>

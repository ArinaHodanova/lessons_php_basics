<?
class User {
  private $db;

  public function __construct() {
    $this->db = Database::getMake();
  }

  public function create($fields = []) {
    $this->db->insert('users_reg', $fields);
  }
}
?>

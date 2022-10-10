<?
class userMessage {
  public $name; 
  public $messages;

  public function __construct($name, $message) {
    $this->name = $name;
    $this->messages = $message;
  }

  public function getName() {
    return $this->name;
  }

  public function getMessages() {
    return $this->messages;
  }

}
?>

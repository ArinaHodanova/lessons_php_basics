<?
$actions = [ 
  '*' => 1, 
  '/' => 1, 
  '+' => function (int $value = null, int $exp = null) {
    return $value . ' - ' . $exp ;
  }, 
  '-' => function (int $value = null, int $exp = null) {
    return $value . ' - ' . $exp ;
  }
];

echo call_user_func($actions['+'], 10, 20);
echo call_user_func($actions['-'], 1100, 60);
?>

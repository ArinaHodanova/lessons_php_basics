<?
function dd($add) {
  echo '<pre>';
  var_dump($add);
  echo '</pre>';
}

function getPath($path) {
  $position = strpos($path, '?');
  return $position === false ? $path : substr($path, 0, $position);
}
?>

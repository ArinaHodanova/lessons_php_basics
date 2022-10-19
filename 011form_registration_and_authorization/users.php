<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

//если пользователь не авторизован перебрасываем на страницу авторизации 
if(isNotLoggedIn()) {
  redirect_to('login.php');
} 

//вычисляем статус пользователя
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Список пользователей</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <script async src="js/main.js"></script>
</head>
<body>
  <main>
    <h2>Список пользователей</h2>
    
    <div>
      <p>Пользователь</p>
    </div>

  </main>
</body>

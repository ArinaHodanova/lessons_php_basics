<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Регистрация и авторизация</title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Личный кабинет</h2>
                    </div>

                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-content">
                                <div class="form-group">
                                    <div class="alert alert-success fade show" role="alert">
                                        Здравствуйте, <?=$_SESSION['user']['email']?>.
                                    </div>
                                    <a href="?name=<?=$_SESSION['user']['email']?>" class="btn btn-info">Выйти</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?if($_GET['name'] == $_SESSION['user']['email']) {
                unset($_SESSION['user']);
                header('Location: index.php');
                exit;
            }?>

        </main>
        
    </body>
</html>

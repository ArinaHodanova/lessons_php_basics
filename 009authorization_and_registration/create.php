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
    <body>
<main>
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Регистрация</h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-content">
                                <div class="form-group">
                                    <?if(!empty($_SESSION['error'])):?>
                                    <div class="alert alert-danger fade show" role="alert">
                                        <?=$_SESSION['error']?>
                                    </div>
                                    <?endif?>

                                    <form action="store.php" method="post">
                                        <div class="form-group">
                                        	<label class="form-label" for="simpleinput" >Email</label>
                                            <input type="text" name="email" id="simpleinput" class="form-control">
                                        </div>

                                        <label class="form-label" for="simpleinput">Password</label>
                                        <input type="password" name="password" id="simpleinput" class="form-control" >
                                        <button class="btn btn-success mt-3" type="submit">Submit</button>
                                    </form>
                                </div><!--/form-group-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>
</html>
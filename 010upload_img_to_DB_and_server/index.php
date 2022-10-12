<?
session_start();
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    </head>
    <body>
        <main>
            <div class="container">
                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>Добавить картинку в базу и в папку, и выгрузить</h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content">
                                    <div class="form-group">
                                        <?if(!empty($_SESSION['error'])):?>
                                          <?=$_SESSION['error']; unset($_SESSION['error'])?>
                                        <?endif?>
                                        <?if(!empty($_SESSION['done'])):?>
                                          <?=$_SESSION['done']; unset($_SESSION['done'])?>
                                        <?endif?>

                                        
                                        <form action="setting.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                              <input type="file" name="pictures" class="form-control">
                                            </div>
                                            <button class="btn btn-success mt-3" type="submit">Отправить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Загруженные картинки
                            </h2>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content image-gallery">
                                    <div class="row">
                                          <?foreach($result as $elem):?>
                                            <img class="col-md-4" src="uploads/<?=$elem['name']?>" style="width: 100%;">
                                          <?endforeach?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>

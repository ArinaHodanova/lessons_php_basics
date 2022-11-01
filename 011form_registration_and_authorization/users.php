<?error_reporting(-1);
require_once __DIR__ . '/function.php';
require_once __DIR__ . '/db.php';

//если пользователь не авторизован перебрасываем на страницу авторизации 
if(isNotLoggedIn()) {
  redirect_to('login.php');
}

$users = getUsers($db);//получаем массив пользователей
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Список пользователей</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
  <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
  <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
  <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
  <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
  <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
  <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
  <script async src="js/main.js"></script>
</head>
<body>
  <main class="page-content">
    <h2>Список пользователей</h2>
    
    <?if(!empty($_SESSION['danger'] )):?>
      <div class="alert alert-primary col-xl-4" role="alert"><?=displayFlashMassege('danger')?></div>
    <?endif?>
    
    <!--если пользователь пытается отредактировать не свою страницуы-->
    <?if(!empty($_SESSION['error'] )):?>
      <div class="alert alert-danger col-xl-4" role="alert"><?=displayFlashMassege('error')?></div>
    <?endif?>

    <?//проверяем админ ли пользователь или нет?>
    <?if(isAdmin(getAuthenticatedUser())):?>
      <div>
        <a href="add_user.php?id=<?=$_SESSION['user']['id']?>" type="button" class="btn btn-warning">Добавить пользователя</a>
      </div>
    <?endif?>

      <div class="row js-list-filter" id="js-contacts">
                  <?foreach($users as $user):?>
                  <div class="col-xl-4">
                    <div id="c_1" class="card border shadow-0 mb-g shadow-sm-hover" data-filter-tags="oliver kopyov" <?=(isIdentical($user, getAuthenticatedUser()))? "style=background-color:#ffeaea;": false ?>>
                        <div class="card-body border-faded border-top-0 border-left-0 border-right-0 rounded-top">
                            <div class="d-flex flex-row align-items-center">
                                <span class="status status-<?=$user['status']?> mr-3">
                                    <span class="rounded-circle profile-image d-block " style="background-image:url(<?=$user['image']?>); background-size: cover;"></span>
                                </span>
                                <div class="info-card-text flex-1">
                                    <?if(isIdentical($user, getAuthenticatedUser())):?>
                                      <a href=""><?=$user['username']?></a>
                                    <?else:?>
                                      <a><?=$user['username']?></a>
                                    <?endif?>
                                    <?if(isAdmin(getAuthenticatedUser()) || isIdentical($user, getAuthenticatedUser())):?>
                                    <a href="javascript:void(0);" class="fs-xl text-truncate text-truncate-lg text-info" data-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a>
                                   <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="edit.html?id=<?=$user['id']?>">Редактировать</a>
                                        <a class="dropdown-item" href="security.html?id=<?=$user['id']?>">Безопасность</a>
                                        <a class="dropdown-item" href="status.html?id=<?=$user['id']?>">Установить статус</a>
                                        <a class="dropdown-item" href="media.html?id=<?=$user['id']?>">Загрузить аватар</a>
                                        <a class="dropdown-item" href="delete.php?id=<?=$user['id']?>">Удалить аватар</a>
                                    </div>
                                    <?endif?>

                                    <span class="text-truncate text-truncate-xl"><?=$user['job_title']?></span>
                                </div>
                                <button class="js-expand-btn btn btn-sm btn-default d-none waves-effect waves-themed" data-toggle="collapse" data-target="#c_1 > .card-body + .card-body" aria-expanded="false">
                                    <span class="collapsed-hidden">+</span>
                                    <span class="collapsed-reveal">-</span>
                                </button>
                            </div>
                        </div><!--/card-body-->

                        <div class="card-body p-0 collapse show">
                            <div class="p-3">
                                <a href="tel:<?=$user['phone']?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                  <i class="fas fa-mobile-alt text-muted mr-2"></i><?=$user['phone']?></a>
                                <a href="mailto:<?=$user['email']?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                  <i class="fas fa-mouse-pointer text-muted mr-2"></i><?=$user['email']?></a>
                                <address class="fs-sm fw-400 mt-4 text-muted">
                                    <i class="fas fa-map-pin mr-2"></i><?=$user['address']?></address>
                                <div class="d-flex flex-row">
                                    <a href="<?=$user['vk']?>" class="mr-2 fs-xxl" style="color:#3b5998">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                    <a href="<?=$user['telegram']?>" class="mr-2 fs-xxl" style="color:#38A1F3">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                    <a href="<?=$user['instagra']?>" class="mr-2 fs-xxl" style="color:#0077B5">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!--/card-body p-0 collapse show-->
                    </div><!--/card-->
                  </div><!--/col-xl-4-->
                  <?endforeach?>
                                
        </div><!--/row-->

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script src="js/miscellaneous/lightgallery/lightgallery.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
            //accordion filter
            initApp.listFilter($('#js_list_accordion'), $('#js_list_accordion_filter'));
            // nested list filter
            initApp.listFilter($('#js_nested_list'), $('#js_nested_list_filter'));
            //init navigation 
            initApp.buildNavigation($('#js_nested_list'));

            $(document).ready(function()
            {


                var $initScope = $('#js-lightgallery');
                if ($initScope.length)
                {
                    $initScope.justifiedGallery(
                    {
                        border: -1,
                        rowHeight: 150,
                        margins: 8,
                        waitThumbnailsLoad: true,
                        randomize: false,
                    }).on('jg.complete', function()
                    {
                        $initScope.lightGallery(
                        {
                            thumbnail: true,
                            animateThumb: true,
                            showThumbByDefault: true,
                        });
                    });
                };
                $initScope.on('onAfterOpen.lg', function(event)
                {
                    $('body').addClass("overflow-hidden");
                });
                $initScope.on('onCloseAfter.lg', function(event)
                {
                    $('body').removeClass("overflow-hidden");
                });

                $('input[type=radio][name=contactview]').change(function()
                {
                    if (this.value == 'grid')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-g');
                        $('#js-contacts .col-xl-12').removeClassPrefix('col-xl-').addClass('col-xl-4');
                        $('#js-contacts .js-expand-btn').addClass('d-none');
                        $('#js-contacts .card-body + .card-body').addClass('show');

                    }
                    else if (this.value == 'table')
                    {
                        $('#js-contacts .card').removeClassPrefix('mb-').addClass('mb-1');
                        $('#js-contacts .col-xl-4').removeClassPrefix('col-xl-').addClass('col-xl-12');
                        $('#js-contacts .js-expand-btn').removeClass('d-none');
                        $('#js-contacts .card-body + .card-body').removeClass('show');
                    }
                });

                //initialize filter
                initApp.listFilter($('#js-contacts'), $('#js-filter-contacts'));
            });

        </script>
  </main>
</body>
  

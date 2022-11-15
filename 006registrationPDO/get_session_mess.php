<?if(isset($_SESSION['result'])): ?>
    <div class="danger" role="alert">
      <?=$_SESSION['result'];unset($_SESSION['result']);?>
    </div>
<?endif?>
  
<?if(isset($_SESSION['error_email'])): ?>
    <div class="danger" role="alert">
        <?=$_SESSION['error_email']; unset($_SESSION['error_email']);?>
    </div>
<?endif?>
  
<?if(isset($_SESSION['error_password'])): ?>
    <div class="danger" role="alert">
      <?=$_SESSION['error_password']; unset($_SESSION['error_password']);?>
    </div>
<?endif?>
  
<?if(isset($_SESSION['success'])): ?>
    <div class="success" role="alert">
        <?=$_SESSION['success']; unset($_SESSION['success']);?>
    </div>
<?endif?>

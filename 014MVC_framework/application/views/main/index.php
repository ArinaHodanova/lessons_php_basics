<h2>Главная страница</h2>

<?foreach($vars['news'] as $val): ?>
    <h3><?=$val['title']?></h3>
    <p><?=$val['desk']?></p>
    <hr>
<?endforeach?>

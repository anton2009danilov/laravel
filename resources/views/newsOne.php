<?php
include('menu.php');
?>

<hr>
<a href="<?= route('news.all') ?>">Все новости</a>

<?php foreach ($categories as $category):?>
    <a href="<?= route('news.category', $category['id']) ?>"><?=$category['name']?></a>
<?php endforeach;?>

<hr>

<article>
    <h3><?=$news['title']?></h3>
    <p>
        <?=$news['text']?>
    </p>
</article>

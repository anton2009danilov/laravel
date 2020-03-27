<?php
include('menu.php');
?>



<div>
    <hr>
    <a href="<?= route('news.all') ?>">Все новости</a>

    <?php foreach ($categories as $category):?>
        <a href="/news/category/<?= $category['id'] ?>"><?=$category['name']?></a>
<!--        <a href="--><?//= route('news.category', $category['id']) ?><!--">--><?//=$category['name']?><!--</a>-->
    <?php endforeach;?>

    <hr>
    <ul>
        <?php foreach ($news as $item): ?>
        <li>
            <a href="<?=route('news.one', $item['id'])?>"> <?=$item['title']?> </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>


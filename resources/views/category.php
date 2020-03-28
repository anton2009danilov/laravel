<?php
include('menu.php');
var_dump($category);
?>

<h1><?=$category['name']?></h1>

    <hr>
    <a href="<?= route('news.all') ?>">Все новости</a>

    <?php foreach ($categories as $item):?>
        <a href="<?= route('news.category', $item['id']) ?>"><?=$item['name']?></a>
    <?php endforeach;?>

<!--    <hr>-->
<div>
    <ul>
        <?php foreach ($news as $item): ?>
                <li>
                    <a href="<?=route('news.one', $item['id'])?>"> <?=$item['title']?> </a>
                </li>
        <?php endforeach;?>
    </ul>
</div>

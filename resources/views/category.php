<?php
include('menu.php');
?>

<h1><?=$category['name']?></h1>

    <hr>
    <a href="<?= route('news.all') ?>">Все новости</a>

    <?php foreach ($categories as $item):?>
        <a href="/news/category/<?= $item['id'] ?>"><?=$item['name']?></a>
        <!--        <a href="--><?//= route('news.category', $category['id']) ?><!--">--><?//=$category['name']?><!--</a>-->
    <?php endforeach;?>

<!--    <hr>-->
<div>
    <ul>
        <?php foreach ($news as $item) { ?>
            <?php if ($item['category_id'] == $category['id']):?>
                <li>
                    <a href="<?=route('news.one', $item['id'])?>"> <?=$item['title']?> </a>
                </li>
            <?php endif; ?>
        <?php }?>
    </ul>
</div>

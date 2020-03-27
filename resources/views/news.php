<?php
include('menu.php');
?>

<div>
    <hr>
    <a href="#">Категории новостей</a>
    <hr>
    <ul>
        <?php foreach ($news as $item): ?>
        <li>
            <a href="<?=route('news.one', $item['id'])?>"> <?=$item['title']?> </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>


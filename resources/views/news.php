<?php
include('menu.php');
?>

<div>
    <ul>
        <?php foreach ($news as $item): ?>
        <li>
            <a href="<?=route('news.one', $item['id'])?>"> <?=$item['title']?> </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>


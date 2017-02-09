<h2 class="title text-center"><?php echo $_GET['tag']?></h2>
<ul>
    <?php foreach ($tags as $NewsList): ?>
        <li><a href="/news/<?php echo $NewsList['id_news'] ?>"><?php echo  $NewsList['title'] ?></a></li>
    <?php endforeach;?>
</ul>
<h2 class="title text-center"><?php echo $new['title'] ?></h2>
<img src="/images/news/<?php echo $new['img'] ?>.jpg">
<p>
    <?php echo $new['content'] ?>
</p>

<div>Количество просмотров за последнее время: <?php echo (int)$new['visit']; ?> Читают: <?php echo $new['readers'] ?>
</div>
<div>
    Теги:
    <?php foreach($tags as $tag): ?>
     <a href="/tags/<?php echo $tag['id_tag'] ?>?tag=<?php echo $tag['tag_name']?>"><?php echo $tag['tag_name'] . ', ';?></a>
    <?php endforeach; ?>
</div>
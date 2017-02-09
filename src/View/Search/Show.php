<?php foreach($result as $tag): ?>
    <a href="/tags/<?php echo $tag['id_tag'] ?>/page-1"><?php echo $tag['tag_name'];?></a>
<?php endforeach; ?>

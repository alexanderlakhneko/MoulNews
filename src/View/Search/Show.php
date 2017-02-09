<?php foreach($result as $tag): ?>
    <a href="/tags/<?php echo $tag['id_tag'] ?>?tag=<?php echo $tag['tag_name']?>"><?php echo $tag['tag_name'];?></a>
<?php endforeach; ?>

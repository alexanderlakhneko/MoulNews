<?php use Library\Session; ?>

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
     <a href="/tags/<?php echo $tag['id_tag'] ?>/page-1" class="label label-default"><?php echo $tag['tag_name'] ;?></a>
    <?php endforeach; ?>
</div>

<h3> Messages: <span class="badge"><?= $data['comments']['count']; ?></span></h3>
<?php if (Session::get('user')) : ?>
    <form method="post" id="comment_form" action="">
        <input type='hidden' id='id_news' value='<?= $new['id_news'] ?>'>
        <div class="form-group">
                    <textarea rows="3" placeholder="Написать комментарий...." name="comment"
                              class="form-control"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-info btn-sm">Добавить коммент
        </button>
        <button type="reset" class="btn btn-info btn-sm">Отмена</button>
    </form>
    <br>
<?php else : ?>
    <div style="margin-bottom: 50px;"><a href="/users/login/">Войдите</a>,чтобы оставить комментарий</div>
<?php endif; ?>
<?php if ($data['comments']['count']): ?>
<?php    unset($data['comments']['count']);

    $comment = $comments->CommentsShow($data['comments']);
    echo $comment; ?>
<?php endif; ?>
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
     <a href="/tags/<?php echo $tag['id_tag'] ?>/page-1"><?php echo $tag['tag_name'] . ', ';?></a>
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
    function array_rec($comment, $level = 0)
    {
        static $result;
        foreach ($comment as $item => $value) {
            if ($level == 1) {
                $result .= "<div class='panel panel2 panel-info' style='margin-left: 80px;'>";
            } else {
                $result .= "<div class='panel panel2 panel-info'>";
            }
            $result .= "<div class='panel-heading'>";
            $result .= "<h3 class='panel-title'>";
            $result .= "Name: <a>{$value['name']}</a>";
            $result .= " Time: {$value['date_time']} </h3> </div>";
            $result .= "<div class='panel-body'>{$value['comment']}</div>";
            $result .= "<div class='panel-footer' style='padding: 4px 15px; overflow: hidden;'>";
            if (Session::get('user') && $level == 0) {
                $result .= "<div style='float: left'>";
                $result .= "<a id='answer'>Ответить</a></div>";
            }
            $result .= "<div style='float: right'>";
            $result .= "<input type='hidden' id='id_comment' value='{$value['id_comment']}'>";
            $result .= "<input type='hidden' id='id_user' value='{$value['id_user']}'>";
            $result .= "<button type='button' id='like' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-up'
                             aria-hidden='true'>{$value['cnt_like']}</span>
                     </button>";
            $result .= "<button type='button' id='dislike' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-down'
                             aria-hidden='true'>{$value['cnt_dislike']}</span>
                     </button>";
            $result .= "</div></div></div>";
            if (isset($value['childs'])) {
//                $result.="</div>";
                $level++;
                array_rec($value['childs'], $level);

                $level = 0;
            } else {
//                $result.= "</div>";
            }
        }
        return $result;
    }

    $comment = array_rec($data['comments']);
    echo $comment; ?>
<?php endif; ?>
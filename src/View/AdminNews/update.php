
<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li><a href="/admin/news/page-1">Управление новостями</a></li>
        <li class="active">Редактирование новость</li>
    </ol>
</div>


<h4>Редактировать новость #<?php echo $new['id_news']; ?></h4>

<br/>

<div class="col-lg-12">
    <div class="login-form">
        <form method="post" action="#">
            <div>
                Теги:
                Для удаления тега нажмите на тег:
                <br>
                <?php foreach($tags as $tag): ?>
                    <a href="/tagsdel/<?php echo $tag['id_tag'] ?>/<?php echo $new['id_news']; ?>" class="label label-default"><?php echo $tag['tag_name'] ;?></a>
                <?php endforeach; ?>
                <br>
                <br>
                <select name="id_tag">
                    <?php if (is_array($tagslist)): ?>
                        <?php foreach ($tagslist as $tags): ?>
                            <option value="<?php echo $tags['id_tag']; ?>">
                                <?php echo $tags['tag_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <br>
            <br>
            <input type="submit" name="add" class="btn btn-default" value="Добавить тег">
        </form>

    </div>
</div>


<div class="col-lg-12">
    <div class="login-form">
        <form action="#" method="post" enctype="multipart/form-data">

            <p>Заголовок</p>
            <input type="text" name="title" placeholder="" value="<?php echo $new['title']; ?>">

            <p>Контент</p>
            <textarea rows="10" name="content"><?php echo $new['content']; ?></textarea>

            <p>Аналитика</p>
            <select name="is_analitic">
                <option value="1" <?php if ($new['is_analitic'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($new['is_analitic'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <p>Категория</p>
            <select name="category_id">
                <?php if (is_array($NewsList)): ?>
                    <?php foreach ($NewsList as $category): ?>
                        <option value="<?php echo $category['id']; ?>"
                            <?php if ($new['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <input type="hidden"  name="img" value="<?php echo $new['img']; ?>">
            <br/><br/>

            <p>Изображение товара</p>
            <img src="/images/news/<?php echo $new['img'] ?>.jpg"" width="200" alt="" />
            <input type="file" name="image" placeholder="" value="<?php echo $new['img']; ?>">

            <br/><br/>

            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>










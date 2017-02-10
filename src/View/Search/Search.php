<h2 class="title text-center">Поиск новостей</h2>
<div>
    <form method="post" action="" >
        <h2>Дата:</h2>
        <div>
            <label for="date">С:</label>
            <input type="date" data-date-format="DD MMMM YY" class="form-control" name="date_1" id="date"
                   placeholder="date"><br><br>
            <label for="date">По:</label>
            <input type="date" class="form-control" name="date_2" id="date" placeholder="date">
        </div>
        <h2>Теги:</h2>
        <?php foreach ($tags as  $tag) : ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tags[<?php echo $tag['tag_name'] ?>]" value="<?php echo $tag['id_tag'] ?>"> <?php echo $tag['tag_name'] ?>
                </label>
            </div>
        <?php endforeach; ?>
        <h2>Категория:</h2>
        <?php foreach ($categories as $category) : ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="category[<?php echo $category['name'] ?>]" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?>
                </label>
            </div>
        <?php endforeach; ?><br>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Cancel</button>
    </form>
    <pre>
        <?php if (isset($result['error'])):
            echo $result['error'];
        else:?>
        <ul>
            <?php foreach ($result as $NewsList): ?>
                <li><a href="/news/<?php echo $NewsList['id_news'] ?>"><?php echo  $NewsList['title'] ?></a></li>
            <?php endforeach;?>
        </ul>
        <?php endif; ?>
    </pre>

</div>
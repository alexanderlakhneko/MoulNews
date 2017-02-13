<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li class="active">Управление комментариями</li>
    </ol>
</div>
<h6>Политические комментарии нуждаються в одобрении модератора</h6>
<div class="table-responsive">
    <table class="table-bordered table-striped table">
        <thead>
        <tr>
            <th>Комментарий:</th>
            <th>Имя:</th>
            <th>Новость:</th>
            <th>Категория:</th>
            <th>Дата добавления:</th>
            <th>Выводится:</th>
            <th>Лайков:</th>
            <th>Дизлайков:</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <?php if ($key === 'count') break; ?>
            <tr>
                <td><?= $value['comment'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['category_name'] ?></td>
                <td><?= $value['date_time']?></td>
                <td><?= ($value['is_active'])? 'yes' :'no'; ?></td>
                <td><?= $value['cnt_like'] ?></td>
                <td><?= $value['cnt_dislike'] ?></td>
                <td><a href="/admin/comments/edit/<?= $value['id_comment'] ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/comments/delete/<?= $value['id_comment'] ?>" onclick="return confirmDelete();" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
<br/>

<?php echo $pagination->get(); ?>

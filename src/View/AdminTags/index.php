

<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li class="active">Управление тегами</li>
    </ol>
</div>

<a href="/admin/tags/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить тег</a>

<h4>Список тегов</h4>

<br/>

<table class="table-bordered table-striped table">
    <tr>
        <th>ID тега</th>
        <th>Название тега</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($tagsList as $tag): ?>
        <tr>
            <td><?php echo $tag['id_tag']; ?></td>
            <td><?php echo $tag['tag_name']; ?></td>
            <td><a href="/admin/tags/update/<?php echo $tag['id_tag']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
            <td><a href="/admin/tags/delete/<?php echo $tag['id_tag']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
        </tr>
    <?php endforeach; ?>
</table>





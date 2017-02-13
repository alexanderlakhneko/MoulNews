 <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление тегами</li>
                </ol>
            </div>

            <a href="/admin/menu/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить пункт меню</a>

            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID:</th>
                    <th>Пункт Меню:</th>
                    <th>href:\</th>
                    <th>ID родительского элеента:</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td><?php echo $menu['id']; ?></td>
                        <td><?php echo $menu['name']; ?></td>
                        <td><?php echo $menu['href']; ?></td>
                        <td><?php if($menu['parent_id'] != 0){
                                echo $menu['parent_id'];
                            } ?></td>
                        <td><a href="/admin/menu/update/<?php echo $menu['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/menu/delete/<?php echo $menu['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
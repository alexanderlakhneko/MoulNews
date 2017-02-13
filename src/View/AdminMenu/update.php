<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li><a href="/admin/menu">Управление пунктами меню</a></li>
        <li class="active">Редактировать пункт меню</li>
    </ol>
</div>


<h4>Редактировать пункт меню</h4>

<br/>

<div class="col-lg-4">
    <div class="login-form">
        <form action="#" method="post">

            <p>Пункт Меню:</p>
            <input type="text" name="name" placeholder="" value="<?php echo $menu['name']; ?>">

            <p>href:\</p>
            <input type="text" name="href" placeholder="" value="<?php echo $menu['href']; ?>">

            <br/>

            <p>ID родительского элеента:</p>
            <select name="parent_id">
                <option value="0" <?php if ($menu['parent_id'] == 0) echo ' selected="selected"'; ?>>Без родительского элемента</option>
                <?php foreach ($menusAll as $menuone) :?>
                    <?php if($menuone['id'] != $menu['id']): ?>
                <option value="<?php echo $menuone['id'] ?>" <?php if ($menuone['id'] == $menu['parent_id']) echo ' selected="selected"'; ?>><?php echo $menuone['name'] ?></option>
                        <?php endif; ?>
                <?php endforeach; ?>
            </select>

            <br/><br/><br/>


            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>
<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li><a href="/admin/menu">Управление пунктами меню</a></li>
        <li class="active">Создать пункт меню</li>
    </ol>
</div>


<h4>Создать пункт меню</h4>

<br/>

<div class="col-lg-4">
    <div class="login-form">
        <form action="#" method="post">

            <p>Пункт Меню:</p>
            <input type="text" name="name" placeholder="" value="">

            <p>href:\</p>
            <input type="text" name="href" placeholder="" value="">

            <br/>

            <p>ID родительского элеента:</p>
            <select name="parent_id">
                <option value="0" selected="selected">Без родительского элемента</option>
                <?php foreach ($menusAll as $menuone) :?>

                        <option value="<?php echo $menuone['id'] ?>"><?php echo $menuone['name'] ?></option>

                <?php endforeach; ?>
            </select>

            <br/><br/><br/>


            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>




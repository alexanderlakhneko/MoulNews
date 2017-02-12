
<br/>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li><a href="/admin/product">Управление товарами</a></li>
        <li class="active">Редактировать товар</li>
    </ol>
</div>


<h4>Редактировать товар</h4>

<br/>

<div class="col-lg-4">
    <div class="login-form">
        <form action="#" method="post">

            <p>Название товара</p>
            <input type="text" name="product_name" placeholder="" value="<?php echo $product['product_name']; ?>">

            <p>Изготовитель</p>
            <input type="text" name="firm" placeholder="" value="<?php echo $product['firm']; ?>">

            <p>Стоимость, $</p>
            <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

            <p>Сайт</p>
            <input type="text" name="site" placeholder="" value="<?php echo $product['site']; ?>">

            <br/>

            <p>Активен</p>
            <select name="is_active">
                <option value="1" <?php if ($product['is_active'] == 1) echo ' selected="selected"'; ?>>Да</option>
                <option value="0" <?php if ($product['is_active'] == 0) echo ' selected="selected"'; ?>>Нет</option>
            </select>

            <br/><br/><br/>


            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

            <br/><br/>

        </form>
    </div>
</div>
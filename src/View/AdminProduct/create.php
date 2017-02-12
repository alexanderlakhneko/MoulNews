
            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Добавить новый товар</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название товара</p>
                        <input type="text" name="product_name" placeholder="" value="">

                        <p>Изготовитель</p>
                        <input type="text" name="firm" placeholder="" value="">

                        <p>Стоимость, $</p>
                        <input type="text" name="price" placeholder="" value="">

                        <p>Сайт</p>
                        <input type="text" name="site" placeholder="" value="">

                        <br/>

                        <p>Активен</p>
                        <select name="is_active">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br/><br/><br/>


                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>




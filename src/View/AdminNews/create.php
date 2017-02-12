
            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/news/page-1">Управление новостями</a></li>
                    <li class="active">Создать новость</li>
                </ol>
            </div>


            <h4>Добавить новость</h4>

            <br/>
            

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Заголовок</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Контент</p>
                        <textarea rows="10" name="content"></textarea>

                        <p>Аналитика</p>
                        <select name="is_analitic">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        
                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>
                        
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>




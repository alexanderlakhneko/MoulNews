<div id="NewsBlock">
    <ul>
        <?php foreach ($News->getCategoriesList() as $CategoriesList): ?>
        <li>
            <h2><a href="#"><?php echo  $CategoriesList['name'] ?></a></h2>
            <ul>
                <li><a href="#">Aliquam libero</a></li>
                <li><a href="#">Consectetuer adipiscing elit</a></li>
                <li><a href="#">Metus aliquam pellentesque</a></li>
                <li><a href="#">Suspendisse iaculis mauris</a></li>
                <li><a href="#">Urnanet non molestie semper</a></li>
                <li><a href="#">Proin gravida orci porttitor</a></li>
            </ul>
        </li>
        <?php endforeach;?>
    </ul>
</div>

<h2 class="title text-center">Колонка новостнй</h2>
<?php foreach ($News->getCategoriesList() as $CategoriesList): ?>
    <li>
        <h2><a href="/category/<?php echo $CategoriesList['id'] ?>"><?php echo  $CategoriesList['name'] ?></a></h2>
        <ul>
            <?php foreach ($News->getNewsListByCategory($CategoriesList['id']) as $NewsList): ?>
                <li><a href="/news/<?php echo $NewsList['id_news'] ?>"><?php echo  $NewsList['title'] ?></a></li>
            <?php endforeach;?>
        </ul>
    </li>
<?php endforeach;?>

</div><!--features_items-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Последние новости</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <?php $b = 0 ?>
                <?php foreach ($News->getRecommendedNews() as $categoryItem): ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="/images/news/<?php echo $categoryItem['img'] ?>.jpg" alt="" />
                                <p><a href="/news/<?php echo $categoryItem['id_news'] ?>"><?php echo $categoryItem['title'] ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $b++ ?>
                <?php if ($b == 3): ?>
            </div>
            <div class="item">
                <?php endif; ?>
                <?php endforeach;?>
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

<div>
    <h2>Топ 5 самых активных пользователей:</h2>
    <table class="table table-striped"  width="400px">
        <thead>
        <tr>
            <th>№</th>
            <th>Name:</th>
            <th>Count comments:</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;foreach ($data['commentator'] as $commentator): ?>
            <tr>
                <td><?=$i++?></td>
                <td><a href="/comments/<?=$commentator['id_user']?>/page-1"><?=$commentator['name']?></a></td>
                <td><?=$commentator['cnt']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Топ 3 самые обсуждаемые темы:</h2>
    <table class="table table-striped"  width="400px">
        <thead>
        <tr>
            <th>№</th>
            <th>Name:</th>
            <th>Last date:</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1;foreach ($data['themes'] as $theme): ?>
            <tr>
                <td><?=$i++?></td>
                <td><a href="/news/<?=$theme['id_news']?>"><?=$theme['title']?></a></td>
                <td><?=$theme['datet']?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

















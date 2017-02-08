
             <div class="col-sm-6 padding-right">
                 <div class="features_items"><!--features_items-->
                     <h2 class="title text-center">Колонка новостнй</h2>

                        <?php foreach ($News->getCategoriesList() as $CategoriesList): ?>
                            <li>
                                <h2><a href="#"><?php echo  $CategoriesList['name'] ?></a></h2>
                                <ul>
                                    <?php foreach ($News->getNewsListByCategory($CategoriesList['id']) as $NewsList): ?>
                                        <li><a href="#"><?php echo  $NewsList['title'] ?></a></li>
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
                                                        <p><a><?php echo $categoryItem['title'] ?></a></p>
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
                        </div>
             </div><!--/recommended_items-->














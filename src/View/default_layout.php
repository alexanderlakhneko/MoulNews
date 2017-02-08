<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>



<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +38 063 116 07 50</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> alexanderlakhneko@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/user/login"><i class="fa fa-lock"></i> Вход</a></li>
                            <li><a href="/user/register"><i class="fa fa-lock"></i> Регистрация</a></li>
                            <li><a href="/cabinet"><i class="fa fa-user"></i> Аккаунт</a></li>
                            <li><a href="/user/logout"><i class="fa fa-unlock"></i> Выход</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li ><a href="/catalog">Каталог товаров</a></li>
                                    <li><a href="/cart">Корзина</a></li>
                                    <li class="dropdown-submenu">
                                        <a href="#">Выпадающее меню</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Сабменю 1</a></li>
                                            <li><a href="#">Сабменю 2</a></li>
                                            <li><a href="#">Сабменю 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/about">О магазине</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Товары со скидкой</h2>
                    <div class="panel-group category-products">
                        <?php $a = 0?>
                        <?php foreach ($products as $productItem): ?>
                        <div class="panel panel-default" data-placement="right" data-toggle="tooltip"
                             title="Купон на скидку-<?php echo md5(rand(0, 20)) ?> -Примените и получите 10% скидки">
                            <div>
                                <h4 class="panel-title">
                                    <a href="<?php echo $productItem['site']; ?>">
                                        <?php echo $productItem['firm']; ?>
                                    </a>
                                </h4>
                                <h5><?php echo $productItem['product_name']; ?></h5>
                                <p>Price : <span><?php echo $productItem['price']; ?></span> грн.</p><br>
                            </div>
                        </div>
                        <?php $a++ ?>
                        <?php if($a == 4):?>
                    </div>
                </div>
            </div>

            <div>
                <?=$content ?>
            </div>
            <div class="col-sm-3">
                <div class="left-sidebar right-sb">
                    <h2>Товары со скидкой</h2>
                    <div class="panel-group category-products">
                    <?php endif; ?>
                        <?php endforeach; ?>
        </div>
    </div>
</div>

    </div>

</section>


<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Lakhneko © 2017</p>
                <p class="pull-right">PHP News</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/js/jquery.js"></script>
<script src="/js/jquery.cycle2.min.js"></script>
<script src="/js/jquery.cycle2.carousel.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/price-range.js"></script>
<script src="/js/jquery.prettyPhoto.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
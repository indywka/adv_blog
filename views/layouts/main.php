<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="assets/images/logo.jpg" alt=""></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="<?= Url::toRoute(['site/index']) ?>">Home</a></li
                    </li>
                </ul>
                <div class="i_con">
                    <ul class="nav navbar-nav text-uppercase">

                        <?php if (Yii::$app->user->isGuest): ?>
                            <li><a href="<?= Url::toRoute(['site/login']) ?>">Login</a></li>

                            <li><a href="<?= Url::toRoute(['site/signup']) ?>">Register</a></li>

                        <?php else: ?>

                            <?= Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->login . ')',
                                ['class' => 'btn btn-link site/logout', 'style' => "padding-top:10px;"]
                            )
                            . Html::endForm() ?>
                        <?php endif; ?>



                        <?php if (Yii::$app->user->identity->admin): ?>


                            <li><a href="<?= Url::toRoute(['/admin/blog/index']) ?>">admin</a></li>


                        <?php endif; ?>





                    </ul>
                </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>


<?= $content ?>


<!--footer start-->
<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="assets/images/logo2.png" alt=""></div>
                    <div class="about-content">
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">contact Info</h4>

                        <p> Belarus</p>

                        <p> Phone: +37529 258 55 48</p>

                        <p>adventureblog.com</p>
                    </div>
                </aside>
            </div>

            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; Built with <i
                                class="fa fa-heart"></i> by <a href="#">Hanna Atyasheva</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

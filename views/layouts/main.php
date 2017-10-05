<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
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
        <?= Html::csrfMetaTags() ?>
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



                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav text-uppercase">
                        <li><a href="<?= Url::toRoute(['/']) ?>">Home</a></li>
                        <li><a href="<?= Url::toRoute(['site/about']) ?>">About</a></li>
                        <li><a href="<?= Url::toRoute(['site/contact']) ?>">Contact</a></li>
                        <?php if (Yii::$app->user->identity->isAdmin): ?>
                            <li><a href="<?= Url::toRoute(['/admin']) ?>">Admin Panel</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="i_con">
                        <ul class="nav navbar-nav text-uppercase">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::toRoute(['auth/login']) ?>">Login</a></li>
                                <li><a href="<?= Url::toRoute(['auth/signup']) ?>">Register</a></li>
                            <?php else: ?>
                                <?= Html::beginForm(['auth/logout'], 'post')
                                . Html::submitButton(
                                    'Logout(' . Yii::$app->user->identity->name . ')',
                                    ['class'=> 'btn btn-link logout', 'style' => "padding-top:10px;"]
                                )
                                . Html::endForm() ?>
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

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; diplomaBlog <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
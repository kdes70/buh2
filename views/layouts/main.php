<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="favicon.png"  rel="shortcut icon" type="image/x-icon" />

        <?= Html::csrfMetaTags() ?>
        <title>
            <?= isset($this->title) ? Yii::$app->name . ' - ' . Html::encode($this->title) : Yii::$app->name ?>
        </title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    // ['label' => 'Главная', 'url' => ['/main']],
                    ['label' => 'Операции',
                        'items' => [ ['label' => 'Доходы', 'url' => '#'],
                            ['label' => 'Расходы', 'url' => ['/expense']],
                            ['label' => 'Переводы', 'url' => '#'],],
                    ],
                    ['label' => 'Словари',
                        'items' => [
                            ['label' => 'Категории доходов', 'url' => '#'],
                            ['label' => 'Категории расходов', 'url' => ['/categoryexp']],
                            '<li class="divider"></li>',
                            ['label' => 'Кошельки', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'Единицы измерения', 'url' => ['/unit']],
                        ],
                    ],
                    ['label' => 'Управление',
                        'items' => [
                            ['label' => 'Пользователи', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'Настройки', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'Прототип1', 'url' => 'http://www.drebedengi.ru/?module=v2_homeBuhPrivate'],
                            ['label' => 'Прототип2', 'url' => 'http://finance.uramaks.com/'],
                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => 'Войти', 'url' => ['/main/login']] :
                            ['label' => 'Війти (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/main/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?php
                //echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]);
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

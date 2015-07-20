<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
        <link href=<?= Yii::$app->request->baseUrl . '/images/favicon.png' ?> rel="shortcut icon" type="image/x-icon" />

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
                        'items' => [ ['label' => 'Доходы', 'url' => ['/income']],
                            ['label' => 'Расходы', 'url' => ['/expense']],
                            ['label' => 'Переводы', 'url' => '#'],
                            '<li class="divider"></li>',
                            ['label' => 'Шаблоны операций', 'url' => ['#']],
                        ],
                    ],
                    ['label' => 'Отчеты',
                        'items' => [
                            ['label' => 'Отчет 1', 'url' => ['/report/rep1']],
                            ['label' => 'Отчет 2', 'url' => ['/report/rep2']],
                            '<li class="divider"></li>',
                            ['label' => 'Отчет 3', 'url' => ['/report/rep3']],
                            '<li class="divider"></li>',
                            ['label' => 'Отчет 4', 'url' => ['/report/rep4']],
                        ],
                    ],
                    ['label' => 'Словари',
                        'items' => [
                            ['label' => 'Категории доходов', 'url' => ['/categoryinc']],
                            ['label' => 'Категории расходов', 'url' => ['/categoryexp']],
                            '<li class="divider"></li>',
                            ['label' => 'Кошельки (счета)', 'url' => ['/wallet']],
                            '<li class="divider"></li>',
                            ['label' => 'Единицы измерения', 'url' => ['/unit']],
                            '<li class="divider"></li>',
                            ['label' => 'Курсы валют', 'url' => ['/exchange']],
                        ],
                    ],
                    ['label' => 'Управление',
                        'items' => [
                            ['label' => 'Пользователи', 'url' => ['/user']],
                            '<li class="divider"></li>',
                            ['label' => 'Настройки', 'url' => ['/setting']],
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

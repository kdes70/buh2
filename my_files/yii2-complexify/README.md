Виджет "Complexify"
==================================

Проверка надежности пароля <a href="https://www.danpalmer.me/jquery-complexify/" target="blanc">Complexify</a>


Установка:
------------

Установка производится с помощью [composer](http://getcomposer.org/download/).

Запустите
```
composer require yiisoft/yii2-сomplexify:*
```

или добавьте 
```
"yiisoft/yii2-сomplexify": "*",
```
в секцию require файла `composer.json` Вашего приложения.

Использование:
------------


Добавить в 


yiisoft/extensions.php - говнокод:



    'timurmelnikov/yii2-complexify' =>
    array(
        'name' => 'timurmelnikov/yii2-complexify',
        'version' => '0.0.1',
        'alias' =>
        array(
            '@timurmelnikov/widgets' => $vendorDir . '/timurmelnikov/yii2-complexify',
        ),
    ),



Вызов в представлении - <?= Complexify::widget() ?>


<?php

use yii\helpers\Html;

echo Html::beginForm();
echo Html::dropDownList('parent', 1, [1 => 'rrr', 2 => 'eee']) . '<br/>';
echo Html::input('text', 'val');
echo Html::endForm();

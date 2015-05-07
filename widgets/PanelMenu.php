<?php

namespace app\widgets;

use yii\bootstrap\Widget;
use yii\bootstrap\Nav;

/**
 * app\widgets\PanelMenu Виджет "Панель меню" для рализации вертикального меню
 *
 * @author Тимур Мельников <melnikovt@gmail.com>
 * @since Версия 1.0
 */
class PanelMenu extends Widget {

    /**
     * @var Тип - panel-primary, panel-success, panel-info, panel-warning, panel-danger.
     */
    public $type;

    /**
     * @var Заголовок
     */
    public $heading;

    /**
     * @var Подвал. (Еще не написал...)
     */
    public $footer;

    /**
     * @var Массив пунктов меню.
     */
    public $items = [];

    /**
     * Инициализация виджета
     */
    public function init() {
        parent::init();
        if ($this->items === null) {
            $this->items = [];
        }
        if ($this->heading === null) {
            $this->heading = 'Меню';
        }
        if ($this->type === NULL) {
            $this->type = 'panel-default';
        }
    }

    /**
     * Выполнение виджета
     * @return string строка, содержащая HTML виджета
     */
    public function run() {
        return '<div class="panel ' . $this->type . '">'
                . '<div class="panel-heading">' . $this->heading
                . '</div>'
                . '<div class="panel-body"> ' . Nav::widget([
                    'options' => ['class' => 'nav-stacked'],
                    'items' => $this->items,
                ])
                . ' </div>'
                . '</div>';
    }

}

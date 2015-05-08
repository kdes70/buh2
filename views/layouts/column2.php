<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="row">
    <?php
    echo yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ])
    ?>
</div>
<div class="row">
    <div class="col-lg-2">
        <?php
    
    
        echo timurmelnikov\widgets\PanelMenu::widget(['items' => isset($this->params['menuItems']) ? $this->params['menuItems'] : [],
            'heading' => 'Действия раздела',
                //'type' => 'panel-danger'
        ]);
        ?>
    </div>
    <div class="col-lg-10">
        <?php echo $content; ?>
    </div>
</div>
<?php
$this->endContent();


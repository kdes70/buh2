<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="row">
    <?php
    echo yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ])
    ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $content; ?>
    </div>
</div>
<?php
$this->endContent();

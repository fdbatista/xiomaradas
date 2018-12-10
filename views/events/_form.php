<?php

use app\models\Event;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Event */
/* @var $form ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    echo '<label class="control-label">Tag Multiple</label>';
    echo Select2::widget([
        'name' => 'color_2',
        'value' => ['red', 'green'], // initial value
        'data' => ['red', 'green', 'blue', 'yellow'],
        'maintainOrder' => true,
        'toggleAllSettings' => [
            'selectLabel' => '<i class="fas fa-ok-circle"></i> Tag All',
            'unselectLabel' => '<i class="fas fa-remove-circle"></i> Untag All',
            'selectOptions' => ['class' => 'text-success'],
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'options' => ['placeholder' => 'Select a color ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]);
    ?>

    <br />
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evidence */

$this->title = 'Create Evidence';
$this->params['breadcrumbs'][] = ['label' => 'Evidences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evidence-create">

    <!--<h3><?= Html::encode($this->title) ?></h3>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BeneficiarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficiary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idBeneficiary') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'aPaterno') ?>

    <?= $form->field($model, 'aMaterno') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'idNumber') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'idTypeIdentification') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

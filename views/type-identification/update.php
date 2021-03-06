<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeIdentification */

$this->title = 'Update identification type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Identification types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idTypeIdentification]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-identification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeIdentification */

$this->title = 'Create identification type';
$this->params['breadcrumbs'][] = ['label' => 'Identification types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-identification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypeIdentification */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Identification types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-identification-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTypeIdentification], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTypeIdentification], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <br/><br/>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTypeIdentification',
            'name',
        ],
    ]) ?>

</div>

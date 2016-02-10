<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RequestCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Request Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idRequestCategory], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idRequestCategory], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idRequestCategory',
            'name',
        ],
    ]) ?>

</div>

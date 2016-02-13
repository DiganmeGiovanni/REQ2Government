<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idUser], [
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
            'idUser',
            'username',
            'name',
            'aPaterno',
            'aMaterno',
            'email:email',
            [
                'attribute' => 'active',
                'value' => $model->active ? 'Yes' : 'No' 
            ],
            [
                'attribute' => 'idPermission',
                'value' => $model->permission->name
            ]
        ],
    ]) ?>

</div>

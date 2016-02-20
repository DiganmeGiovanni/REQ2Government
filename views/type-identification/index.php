<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TypeIdentificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Identification types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-identification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Identification type', ['create'], ['class' => 'btn btn-success']) ?>
        <br/><br/>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idTypeIdentification',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model, $key) {
                        if(count($model->beneficiaries) == 0) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url);
                        }

                        return "";
                    }
                ]
            ],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RequestCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Request Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request Category', ['create'], ['class' => 'btn btn-success']) ?>
        <br/><br/>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idRequestCategory',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model, $key) {
                        if(count($model->requests) == 0) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url);
                        }

                        return "";
                    }
                ]
            ],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        <br/><br/>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'idUser',
            [
                'attribute' => 'idPermission',
                'value' => 'permission.name'
            ],
            'username',
            'name',
            'aPaterno',
            'aMaterno',
            'email:email',
            [
                'attribute' => 'active',
                'value' => 'isActiveText'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        if($model->isSuperAdmin()) {
                            if(Yii::$app->user->identity->isSuperAdmin()) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-pencil"></span>',
                                    $url
                                );
                            }

                            return "";
                        }

                        if(Yii::$app->user->identity->isAdmin() || 
                            Yii::$app->user->identity->isSuperAdmin()) 
                        {
                            return Html::a(
                                '<span class="glyphicon glyphicon-pencil"></span>',
                                $url
                            );
                        }

                        return "";
                    },
                    
                    'delete' => function($url, $model, $key) {
                        if($model->isSuperAdmin()) {
                            if(Yii::$app->user->identity->isSuperAdmin()) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-trash"></span>',
                                    $url
                                );
                            }

                            return "";
                        }

                        if(Yii::$app->user->identity->isAdmin() || 
                            Yii::$app->user->identity->isSuperAdmin())
                        { 
                            return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>',
                                $url
                            );
                        }

                        return "";
                    },
                ]
            ],
        ],
    ]); ?>

</div>


























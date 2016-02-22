<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

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

    <p>
        <?=
        ExportMenu::widget([
            'asDropdown' => false,
            'dataProvider' => $dataProvider,
            'exportConfig' => [
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false,
                ExportMenu::FORMAT_EXCEL => [
                    'label' => 'Exportar a Excel'
                ],
                ExportMenu::FORMAT_EXCEL_X => false,
            ],
            'filename' => 'Reporte de usuarios',
            'showConfirmAlert' => false,
            'target' => ExportMenu::TARGET_BLANK,
            'columns' => [
                'idUser',
                'username',
                'name',
                'aPaterno',
                'aMaterno'
            ]
        ])
        ?>
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


























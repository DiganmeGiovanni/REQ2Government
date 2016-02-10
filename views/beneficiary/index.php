<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BeneficiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficiaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Beneficiary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idBeneficiary',
            'name',
            'aPaterno',
            'aMaterno',
            'email:email',
            // 'idNumber',
            // 'birthday',
            // 'idTypeIdentification',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

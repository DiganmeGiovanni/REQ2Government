<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4"><br/>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4"><br/>
            <?php
                if($model->isNewRecord) {
                    echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
                }
                else {
                    echo $form->field($model, 'active')->dropDownList(
                        ['1' => 'Yes', '0' => 'No'],
                        []
                    );
                }
            ?>

        </div>
        <div class="col-md-4"><br/> 
            <?= 
                $form->field($model, 'idPermission')->dropDownList(
                    $permissions, 
                    ['prompt' => 'Choose user\'s permission']
                );
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"><br/>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4"><br/> 
            <?= $form->field($model, 'aPaterno')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4"><br/> 
            <?= $form->field($model, 'aMaterno')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"><br/> 
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12"><br/>
            <div class="form-group">
                <?= 
                    Html::submitButton(
                        $model->isNewRecord ? 'Create' : 'Update', 
                        [
                            'class' => $model->isNewRecord ? 
                                    'btn btn-success' : 
                                    'btn btn-primary'
                        ]
                    ); 
                ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

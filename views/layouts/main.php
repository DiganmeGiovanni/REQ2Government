<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'REQ2Government',
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    ?>

    <?= // Navigation menu items
        Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                [
                    'label' => 'Peticiones', 
                    'url' => ['/request/index'],
                    'visible' => (!Yii::$app->user->isGuest)
                ],
                [
                    'label' => 'Beneficiarios', 
                    'url' => ['/beneficiary/index'],
                    'visible' => (!Yii::$app->user->isGuest)
                ],
                [
                    'label' => 'Tipos de identificación', 
                    'url' => ['/type-identification/index'],
                    'visible' => (
                        !Yii::$app->user->isGuest && (
                            Yii::$app->user->identity->isAdmin() ||
                            Yii::$app->user->identity->isSuperAdmin()
                        )
                    )
                ],
                [
                    'label' => 'Categorias de peticiones', 
                    'url' => ['/request-category/index'],
                    'visible' => (
                        !Yii::$app->user->isGuest && (
                            Yii::$app->user->identity->isAdmin() ||
                            Yii::$app->user->identity->isSuperAdmin()
                        )
                    )
                ],
                [
                    'label' => 'Usuarios', 
                    'url' => ['/usuario/index'],
                    'visible' => (
                        !Yii::$app->user->isGuest && (
                            Yii::$app->user->identity->isAdmin() ||
                            Yii::$app->user->identity->isSuperAdmin()
                        )
                    )
                ],
                
                Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/site/login']] :
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
            ],
        ]);
    ?>

    <?php
        NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Request to your Government | <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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
        'brandLabel' => Html::img('@web/img/order.png', ['alt' => Yii::$app->name, 'width' => '35px', 'height' => '35px']),
        'brandUrl'   => Yii::$app->homeUrl,
        'brandOptions' => [
            'style' => 'padding: 7px'
        ],
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
                    'label' => 'Requests', 
                    'url' => ['/request/index'],
                    'visible' => (!Yii::$app->user->isGuest)
                ],
                [
                    'label' => 'Beneficiaries', 
                    'url' => ['/beneficiary/index'],
                    'visible' => (!Yii::$app->user->isGuest)
                ],
                [
                    'label' => 'Identification types', 
                    'url' => ['/type-identification/index'],
                    'visible' => (
                        !Yii::$app->user->isGuest && (
                            Yii::$app->user->identity->isAdmin() ||
                            Yii::$app->user->identity->isSuperAdmin()
                        )
                    )
                ],
                [
                    'label' => 'Request categories', 
                    'url' => ['/request-category/index'],
                    'visible' => (
                        !Yii::$app->user->isGuest && (
                            Yii::$app->user->identity->isAdmin() ||
                            Yii::$app->user->identity->isSuperAdmin()
                        )
                    )
                ],
                [
                    'label' => 'Users', 
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

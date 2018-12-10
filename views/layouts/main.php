<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        'brandLabel' => '<i class="fa fa-home"></i>Xiomaradas',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $menuItems = [];
    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<i class="fa fa-home"></i>Home', 'url' => ['/site/index']];
        $menuItems[] = ['label' => '<i class="fa fa-info-circle"></i>About', 'url' => ['/site/about']];
        $menuItems[] = ['label' => '<i class="fa fa-sign-in-alt"></i>Login', 'url' => ['/site/login']];
    } else {
        if (Yii::$app->user->identity->isAdmin()) {
            $menuItems[] = [
            'label' => '<i class="fa fa-cog"></i>Administrar',
            'items' => [
                 ['label' => 'Categor&iacute;as', 'url' => ['/categories']],
                 ['label' => 'Eventos', 'url' => ['/events']],
                 ['label' => 'Tipos de evidencia', 'url' => ['/evidence-types']],
            ]
        ];
        }
        $menuItems[] = [
            'label' => '<i class="fa fa-user"></i>Mi cuenta',
            'items' => [
                 '<li class="dropdown-header">' . Yii::$app->user->identity->username . '</li>',
                 '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton('Logout', ['style' => 'width: 100%; text-align: left; background: transparent; border: none; margin: auto auto 10px 10px;']). Html::endForm() . '</li>'
            ],
        ];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; FDB <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

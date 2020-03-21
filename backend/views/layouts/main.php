<?php

/* @var $this \yii\web\View */

/* @var $content string */

/* @var $categories array */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div id="container" class="row">
    <div class="col-lg-2">
        <?php
//        echo Html::beginTag('div', ['class' => 'dropdown']);
//
//        foreach ($categories as $category) {
//            echo Html::tag('button', $category['name'], [
//                'class' => "btn btn-secondary dropdown-toggle",
//                'type' => "button",
////                'id' => "dropdownMenuButton",
//                'data-toggle' => "dropdown",
//                'aria-haspopup' => "true",
//                'aria-expanded' => "false"
//
//            ]);
//
//            echo Html::beginTag('div', [
//                'class' => "dropdown-menu",
//                'aria-labelledby' => "dropdownMenuButton"
//            ]);
//
//            foreach ($category['tables'] as $table){
//
//            }
//
//            echo Html::endTag('div');
//        }
//        echo Html::endTag('div');
        ?>

<!--        <div class="">-->
<!--            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"-->
<!--                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                Dropdown button-->
<!--            </button>-->
<!--            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--                <a class="dropdown-item" href="#">Action</a>-->
<!--                <a class="dropdown-item" href="#">Another action</a>-->
<!--                <a class="dropdown-item" href="#">Something else here</a>-->
<!--            </div>-->
<!--        </div>-->

    </div>
    <div id="content" class="col-lg-9">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
    <div class="col-lg-1"></div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

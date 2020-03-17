<?php

/* @var $this yii\web\View */
/* @var $query string */

$this->title = 'SQL Query';

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<!--<link rel="stylesheet" href="..\..\web\css\sql-query.css">-->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col" id="main">

        <div class="row">
            <div class="col">
                <form method="post" action="/sql-query/execute">
                    <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam,
                        Yii::$app->getRequest()->getCsrfToken(), []) ?>
                    <label for="sql-query-text"></label>
                    <textarea name="query" id="sql-query-text" rows="18" required><?= $query ?></textarea>
                    <button class="btn btn-success" type="submit" id="sql-query-btn" name="exec" value="exec">
                        Выполнить
                    </button>
                    <button class="btn btn-primary" type="submit" id="sql-query-save-btn" name="save" value="save">
                        Сохранить
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-1">

    </div>
</div>

<?php

/* @var $this yii\web\View */
/* @var $queryError string */
/* @var $query string */

$this->title = 'SQL Query';

use yii\widgets\ActiveForm;

?>

<!--<link rel="stylesheet" href="..\..\web\css\sql-query.css">-->

<div class="row">
    <div class="col-md-1"></div>
    <div class="col" id="main">

        <div class="row">
            <div class="col">
                <form method="get" action="/sql-query/execute">
                    <label for="sql-query-text"></label>
                    <textarea name="query" id="sql-query-text" rows="18" style="width: 100%"
                              required><?= $query ?></textarea>
                    <button type="submit" style="width: 25%;float: right;margin: 10px 0">Выполнить</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p id="error">
                    <?= $queryError ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-1">

    </div>
</div>

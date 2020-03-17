<?php

use yii\data\ArrayDataProvider;
use yii\grid\GridView;

/** @var array $data */

$provider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 0,
    ],
    'sort' => [
        'attributes' => ['id', 'name'],
    ],
]);

//$columns = array_keys($data[0]);
//$columns[] = ['class' => 'yii\grid\ActionColumn'];

echo GridView::widget([
    'dataProvider' => $provider,
//    'columns' => $columns
]);

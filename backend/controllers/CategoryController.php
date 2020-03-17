<?php


namespace backend\controllers;


use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $this->render('index');
    }
}
<?php


namespace backend\controllers;

use http\Exception;
use Yii;
use yii\web\Controller;

class SqlQueryController extends Controller
{
    private $query;
    private $queryError;

    public function actionIndex()
    {
        $this->query = Yii::$app->session->getFlash('query');
        $this->queryError = Yii::$app->session->getFlash('error');
        Yii::$app->session->remove('query');
        Yii::$app->session->remove('error');
        return $this->render('index', [
            'query' => $this->query,
            'queryError' => $this->queryError
        ]);
    }

    public function actionExecute()
    {
        $query = Yii::$app->request->get()['query'];

        Yii::$app->session->setFlash('query', $query);

        try {
            Yii::$app->db->createCommand($query)->execute();
        } catch (\Throwable $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());//            self::$queryError = $e->getMessage();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}
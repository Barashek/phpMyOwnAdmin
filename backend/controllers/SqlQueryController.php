<?php


namespace backend\controllers;

use src\Modules\Query\Domain\Entity\QueryEntity;
use src\Modules\Query\Infrastructure\Repository\QueryRepository;
use Yii;
use yii\web\Controller;

class SqlQueryController extends Controller
{
    private $query;
//    private $queryError;
//    private $queryAccess;
    private $queryRepository;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->queryRepository = new QueryRepository();
    }

    public function actionIndex()
    {
        $this->query = Yii::$app->session->getFlash('query');

        Yii::$app->session->remove('query');

//        Yii::$app->session->addFlash('danger',  Yii::$app->session->getFlash('error'));

        return $this->render('index', [
            'query' => $this->query,
        ]);
    }

    public function actionExecute()
    {
        $query = Yii::$app->request->post('query');

        Yii::$app->session->setFlash('query', $query);

        if (!empty(Yii::$app->request->post('exec'))) {
            $this->queryRepository->exec($query);
        }

        if (!empty(Yii::$app->request->post('save'))) {
            $queryModel = new QueryEntity();
            $queryModel->query = $query;

            if ($this->queryRepository->save($queryModel)) {
                Yii::$app->session->addFlash('success', "Запрос успешно сохранен");
            } else {
                Yii::$app->session->addFlash('danger', "Произошла ошибка сохранения");
            }
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}
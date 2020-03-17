<?php


namespace backend\controllers;

use src\Modules\Query\Domain\Entity\QueryEntity;
use src\Modules\Query\Infrastructure\Repository\QueryRepository;
use src\Modules\Query\Infrastructure\Service\QueryService;
use Yii;
use yii\web\Controller;

class SqlQueryController extends Controller
{
    private $query;
    private $queryRepository;
    private $queryService;

    public function __construct(
        $id,
        $module,
        QueryRepository $queryRepository,
        QueryService $queryService,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->queryRepository = $queryRepository;
        $this->queryService = $queryService;
    }

    public function actionIndex()
    {
        $this->query = Yii::$app->session->getFlash('query');
        Yii::$app->session->remove('query');

        return $this->render('index', [
            'query' => $this->query,
        ]);
    }

    public function actionExecute()
    {
        $query = Yii::$app->request->post('query');

        Yii::$app->session->setFlash('query', $query);

        if (!empty(Yii::$app->request->post('exec'))) {
            $result = $this->queryExecute($query);
            if (is_array($result)) {
                return $this->render('view', ['data' => $result]);
            }
        }

        if (!empty(Yii::$app->request->post('save'))) {
            $this->querySave($query);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * @param string $query
     * @return array|int|string|null
     */
    private function queryExecute(string $query)
    {
        $result = $this->queryService->exec($query);

        if (is_string($result)) {
            Yii::$app->session->addFlash('danger', $result);
        } elseif (is_int($result)) {
            Yii::$app->session->addFlash('success', "Затронуто {$result} строк");
        } else {
            return $result;
        }
        return null;
    }

    /**
     * @param string $query
     */
    private function querySave(string $query)
    {
        $queryEntity = new QueryEntity();
        $queryEntity->query = $query;

        try {
            $this->queryRepository->save($queryEntity);
            Yii::$app->session->addFlash('success', "Запрос успешно сохранен");
        } catch (\Throwable $exception) {
            Yii::$app->session->addFlash('danger', "Произошла ошибка сохранения");
        }
    }
}

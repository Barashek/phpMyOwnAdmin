<?php


namespace backend\controllers;


use src\Modules\SysDB\Infrastructure\Service\SelectTablesAndCategoriesService;
use yii\web\Controller;

class MyController extends Controller
{
    /** @var SelectTablesAndCategoriesService */
    private $selectTablesAndCategoriesService;

    public function __construct(
        $id,
        $module,
        $config = [],
        SelectTablesAndCategoriesService $selectTablesAndCategoriesService
    ) {
        parent::__construct($id, $module, $config);
        $this->selectTablesAndCategoriesService = $selectTablesAndCategoriesService;
    }


    public function beforeAction($action)
    {
        $categories = $this->selectTablesAndCategoriesService->selectCategories();
        $tablesWithoutCategories = $this->selectTablesAndCategoriesService->selectTables();

        $this->view->params['categories'] = $categories;
        $this->view->params['tables'] = $tablesWithoutCategories;
        return parent::beforeAction($action);
    }


}
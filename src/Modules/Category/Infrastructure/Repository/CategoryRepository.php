<?php


namespace src\Modules\Category\Infrastructure\Repository;

use Yii;
use src\Core\Domain\EntityInterface;
use src\Core\Infrastructure\AbstractRepository;
use src\Modules\Category\Domain\Repository\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{

    public function selectAll(): array
    {
        return Yii::$app->db->createCommand("SELECT * FROM category")->queryAll();
    }
}

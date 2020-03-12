<?php


namespace src\Modules\Query\Infrastructure\Repository;

use Yii;
use src\Core\Domain\EntityInterface;
use src\Core\Infrastructure\AbstractRepository;
use src\Modules\Query\Domain\Repository\QueryRepositoryInterface;


class QueryRepository extends AbstractRepository implements QueryRepositoryInterface
{
    public function exec(string $query)
    {
        try {
            Yii::$app->db->createCommand($query)->execute();
        } catch (\Throwable $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update(EntityInterface $entity)
    {
        // TODO: Implement update() method.
    }

    public function delete(EntityInterface $entity)
    {
        // TODO: Implement delete() method.
    }
}
<?php


namespace src\Modules\Query\Infrastructure\Repository;

use Yii;
use src\Core\Infrastructure\AbstractRepository;
use src\Modules\Query\Domain\Repository\QueryRepositoryInterface;

class QueryRepository extends AbstractRepository implements QueryRepositoryInterface
{
    /**
     * @param string $query
     * @return int
     * @throws
     */
    public function exec(string $query)
    {
        return Yii::$app->db->createCommand($query)->execute();
    }

    /**
     * @param string $query
     * @return array
     * @throws
     */
    public function select(string $query)
    {
        $data = Yii::$app->db->createCommand($query)->queryAll();
        return $data;
    }
}
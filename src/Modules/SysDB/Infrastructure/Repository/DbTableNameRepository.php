<?php


namespace src\Modules\SysDB\Infrastructure\Repository;


use src\Core\Domain\EntityInterface;
use src\Core\Infrastructure\AbstractRepository;
use src\Core\Infrastructure\Mapper;
use src\Modules\SysDB\Domain\Entity\DbTableNameEntity;
use src\Modules\SysDB\Domain\Repository\DbTableNameRepositoryInterface;
use Yii;

class DbTableNameRepository extends AbstractRepository implements DbTableNameRepositoryInterface
{

    public function findWithoutCategories(): array
    {
        $sql = "select * from db_table_name where category_id=null";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function findWithCategories(): array
    {
        $sql = "select * from db_table_name where category_id<>null";
        $mapper = new Mapper();
        return $mapper->arrayToArrayOfEntity(
            Yii::$app->db->createCommand($sql)->queryAll(),
            new DbTableNameEntity()
        );
    }
}

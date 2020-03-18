<?php


namespace src\Modules\SysDB\Infrastructure\Repository;


use src\Core\Domain\EntityInterface;
use src\Core\Infrastructure\AbstractRepository;
use src\Core\Infrastructure\Mapper;
use src\Modules\SysDB\Domain\Entity\DbColumnTypeEntity;
use src\Modules\SysDB\Domain\Repository\DbColumnTypeRepositoryInterface;
use Yii;

class DbColumnTypeRepository extends AbstractRepository implements DbColumnTypeRepositoryInterface
{

    public function findIdByName(string $name): int
    {
        $sql = "SELECT id FROM db_column_type WHERE name=:name";
        $id = Yii::$app->db->createCommand($sql)->bindValue(':name', $name)->queryOne();
        if (!$id) {
            return $this->createNewType($name);
        }
        return $id['id'];
    }

    /**
     * @param string $name
     * @return int
     */
    private function createNewType(string $name): int
    {
        $mapper = new Mapper();
        $model = $mapper->arrayToEntity(['name' => $name], new DbColumnTypeEntity());
        $this->save($model);
        return Yii::$app->db->lastInsertID;
    }
}

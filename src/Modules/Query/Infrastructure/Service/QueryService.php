<?php


namespace src\Modules\Query\Infrastructure\Service;

use Yii;
use src\Core\Infrastructure\Mapper;
use src\Modules\SysDB\Domain\Entity\DbColumnNameEntity;
use src\Modules\SysDB\Domain\Entity\DbTableNameEntity;
use src\Modules\SysDB\Infrastructure\Repository\DbColumnNameRepository;
use src\Modules\SysDB\Infrastructure\Repository\DbColumnTypeRepository;
use src\Modules\SysDB\Infrastructure\Repository\DbTableNameRepository;
use src\Modules\Query\Infrastructure\Repository\QueryRepository;

class QueryService
{
    /** @var QueryRepository */
    private $queryRepository;

    /** @var DbTableNameRepository */
    private $dbTableNameRepository;

    /** @var DbColumnNameRepository */
    private $dbColumnNameRepository;

    /** @var DbColumnTypeRepository */
    private $dbColumnTypeRepository;

    private $mapper;

    public function __construct(
        QueryRepository $queryRepository,
        DbTableNameRepository $dbTableNameRepository,
        DbColumnNameRepository $dbColumnNameRepository,
        DbColumnTypeRepository $dbColumnTypeRepository,
        Mapper $mapper
    ) {
        $this->queryRepository = $queryRepository;
        $this->dbTableNameRepository = $dbTableNameRepository;
        $this->dbColumnNameRepository = $dbColumnNameRepository;
        $this->dbColumnTypeRepository = $dbColumnTypeRepository;
        $this->mapper = $mapper;
    }

    public function exec(string $query)
    {
        $query = mb_strtolower($query);

        try {
            if ($this->isSelect($query)) {
                return $this->queryRepository->select($query);
            } elseif ($this->isCreateTable($query)) {
                $this->queryRepository->exec($query);
                $tableName = $this->getTableName($query);
                $tableId = $this->createTable($tableName);
                return $this->createColumn($tableName, $tableId);
            } else {
                return $this->queryRepository->exec($query);
            }
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param string $query
     * @return bool
     */
    private function isSelect(string $query): bool
    {
        return stripos($query, 'select', 0) !== false;
    }

    /**
     * @param string $query
     * @return bool
     */
    private function isCreateTable(string $query): bool
    {
        return stripos($query, 'create table', 0) !== false;
    }

    /**
     * @param string $query
     * @return string
     */
    private function getTableName(string $query): string
    {
        return preg_split("/\s+/", $query)[2];
    }

    /**
     * @param string $tableName
     * @return int
     */
    private function createTable(string $tableName): int
    {
        $dbTableNameEntity = $this->mapper->arrayToEntity(['name' => $tableName], new DbTableNameEntity());
        $this->dbTableNameRepository->save($dbTableNameEntity);
        return Yii::$app->db->lastInsertID;
    }


    /**
     * @param string $tableName
     * @param int $tableId
     * @return int
     */
    private function createColumn(string $tableName, int $tableId): int
    {
        $columnNames = Yii::$app->db->getTableSchema($tableName)->getColumnNames();

        foreach ($columnNames as $columnName) {
            $columnProperties = Yii::$app->db->getTableSchema($tableName)->getColumn($columnName);

            $typeId = $this->dbColumnTypeRepository->findIdByName($columnProperties->dbType);
            $isNull = $columnProperties->allowNull;

            $attributes = [
                'name' => $columnName,
                'table_id' => $tableId,
                'type_id' => $typeId,
                'is_null' => $isNull
            ];

            $dbColumnNameEntity = $this->mapper->arrayToEntity($attributes, new DbColumnNameEntity());
            $this->dbColumnNameRepository->save($dbColumnNameEntity);
        }
        return count($columnNames);
    }
}

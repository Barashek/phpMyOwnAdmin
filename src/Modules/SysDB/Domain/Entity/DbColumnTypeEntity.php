<?php


namespace src\Modules\SysDB\Domain\Entity;


use src\Core\Domain\AbstractAttributesEntity;
use src\Core\Domain\EntityInterface;

class DbColumnTypeEntity extends AbstractAttributesEntity implements EntityInterface
{
    private const TABLE_NAME = 'db_column_type';

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    public $created_at;


    /**
     * @return string
     */
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
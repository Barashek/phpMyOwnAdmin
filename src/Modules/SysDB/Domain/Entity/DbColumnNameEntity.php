<?php


namespace src\Modules\SysDB\Domain\Entity;


use src\Core\Domain\AbstractAttributesEntity;
use src\Core\Domain\EntityInterface;

class DbColumnNameEntity extends AbstractAttributesEntity implements EntityInterface
{
    private const TABLE_NAME = 'db_column_name';

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var int */
    public $table_id;

    /** @var int */
    public $size;

    /** @var bool */
    public $is_null;

    /** @var int */
    public $type_id;

    public $created_at;
    public $updated_at;


    /**
     * @return string
     */
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}
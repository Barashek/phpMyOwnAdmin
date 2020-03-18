<?php


namespace src\Modules\SysDB\Domain\Entity;


use src\Core\Domain\AbstractAttributesEntity;
use src\Core\Domain\EntityInterface;

class DbTableNameEntity extends AbstractAttributesEntity implements EntityInterface
{
    private const TABLE_NAME = 'db_table_name';

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $title;

    /** @var int */
    public $user_id;

    /** @var int */
    public $category_id;

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
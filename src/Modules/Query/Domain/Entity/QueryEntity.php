<?php


namespace src\Modules\Query\Domain\Entity;


use src\Core\Domain\AbstractAttributesEntity;
use src\Core\Domain\EntityInterface;


class QueryEntity extends AbstractAttributesEntity implements EntityInterface
{
    private const TABLE_NAME = "query";

    /** @var int */
    public $id;

    /** @var string */
    public $query;

    public $created_at;


    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }

}
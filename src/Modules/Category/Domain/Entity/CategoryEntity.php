<?php


namespace src\Modules\Category\Domain\Entity;


use src\Core\Domain\AbstractAttributesEntity;
use src\Core\Domain\EntityInterface;


class CategoryEntity extends AbstractAttributesEntity implements EntityInterface
{
    private const TABLE_NAME = "query";

    /** @var int */
    public $id;



    public $created_at;


    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }

}
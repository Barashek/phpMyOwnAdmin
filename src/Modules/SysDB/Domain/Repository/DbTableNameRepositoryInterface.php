<?php


namespace src\Modules\SysDB\Domain\Repository;


interface DbTableNameRepositoryInterface
{
    public function findWithoutCategories(): array;

    public function findWithCategories(): array;
}

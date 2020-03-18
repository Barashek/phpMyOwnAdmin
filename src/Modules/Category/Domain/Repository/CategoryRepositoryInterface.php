<?php


namespace src\Modules\Category\Domain\Repository;


interface CategoryRepositoryInterface
{
    public function selectAll(): array;
}

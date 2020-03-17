<?php


namespace src\Modules\SysDB\Domain\Repository;


interface DbColumnTypeRepositoryInterface
{
    /**
     * @param string $name
     * @return int
     */
    public function findIdByName(string $name): int;
}

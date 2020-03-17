<?php


namespace src\Modules\Query\Domain\Repository;


interface QueryRepositoryInterface
{

    public function exec(string $query);

    public function select(string $query);

}
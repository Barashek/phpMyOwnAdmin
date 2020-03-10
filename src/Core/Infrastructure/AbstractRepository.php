<?php


namespace src\Core\Infrastructure;


abstract class AbstractRepository
{
    abstract function save();
    abstract function insert();
    abstract function update();
    abstract function delete();
}
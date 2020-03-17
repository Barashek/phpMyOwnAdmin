<?php

namespace src\Core\Domain;

interface EntityInterface
{
    /**
     * @return string
     */
    public function getTableName(): string;

    /**
     * @return array
     */
    public function getAttributes(): array;
}
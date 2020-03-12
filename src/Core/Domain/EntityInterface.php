<?php

namespace src\Core\Domain;

interface EntityInterface
{
    public function getTableName(): string;

    public function getAttributes(): array;
}
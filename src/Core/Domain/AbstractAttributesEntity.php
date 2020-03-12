<?php


namespace src\Core\Domain;


abstract class AbstractAttributesEntity
{
    public function getAttributes(): array
    {
        $attributes = [];

        foreach (array_keys(get_object_vars($this)) as $attr_name) {
            $attributes[$attr_name] = $this->{$attr_name};
        }

        return $attributes;
    }
}
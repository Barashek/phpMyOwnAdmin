<?php


namespace src\Core\Infrastructure;

class Mapper
{
    public function map($source, $target)
    {
        if (!is_array($source)) {
            return null;
        }

        $attributes = array_keys(get_object_vars($target));

        foreach ($attributes as $attribute) {
            if (isset($source[$attribute])) {
                $target->{$attribute} = $source[$attribute];
            }
        }

        return $target;
    }
}
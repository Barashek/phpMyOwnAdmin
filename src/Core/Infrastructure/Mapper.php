<?php


namespace src\Core\Infrastructure;

use src\Core\Domain\EntityInterface;

class Mapper
{
    /**
     * @param array $array
     * @param EntityInterface $entity
     * @return EntityInterface
     */
    public function arrayToEntity(array $array, EntityInterface $entity): EntityInterface
    {
        if (!is_array($array)) {
            return null;
        }

        $attributes = array_keys(get_object_vars($entity));

        foreach ($attributes as $attribute) {
            if (isset($array[$attribute])) {
                $entity->{$attribute} = $array[$attribute];
            }
        }

        return $entity;
    }

    /**
     * @param array $array
     * @param EntityInterface $entity
     * @return array
     */
    public function arrayToArrayOfEntity(array $array, EntityInterface $entity): array
    {
        $result = [];

        foreach ($array as $item) {
            $result[] = $this->arrayToEntity($item, $entity);
        }

        return $result;
    }
}

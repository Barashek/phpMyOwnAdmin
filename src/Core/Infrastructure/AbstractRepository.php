<?php


namespace src\Core\Infrastructure;

use Yii;
use src\Core\Domain\EntityInterface;

abstract class AbstractRepository
{
    public function save(EntityInterface $entity)
    {
        if (empty($entity->id)) {
            return $this->insert($entity);
        }
        return $this->update($entity);
    }

    public function insert(EntityInterface $entity)
    {
        $attributes = $this->getEntityAttributes($entity);

        return Yii::$app->db->createCommand()->insert($entity->getTableName(), $attributes)->execute();
    }

    public function update(EntityInterface $entity)
    {
        $attributes = $this->getEntityAttributes($entity);
        $attributes['created_at'] = 'NOW()';

        return Yii::$app->db->createCommand()->update($entity->getTableName(), $attributes)->execute();
    }

    public function delete(EntityInterface $entity)
    {
        return Yii::$app->db->createCommand()
            ->delete($entity->getTableName(), "id=:id", [':id' => $entity->id])
            ->execute();
    }

    /**
     * @param EntityInterface $entity
     * @return array
     */
    private function getEntityAttributes(EntityInterface $entity): array
    {
        $attributes = $entity->getAttributes();

        foreach ($attributes as $key => $value) {
            if (empty($value)) {
                unset($attributes[$key]);
            }
        }

        return $attributes;
    }
}

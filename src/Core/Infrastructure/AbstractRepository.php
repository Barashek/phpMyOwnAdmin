<?php


namespace src\Core\Infrastructure;

use Yii;
use phpDocumentor\Reflection\Types\AbstractList;
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
        $attributes = $entity->getAttributes();

        foreach ($attributes as $key => $value) {
            if (empty($value)) {
                unset($attributes[$key]);
            }
        }

        try {
            Yii::$app->db->createCommand()->insert($entity->getTableName(), $attributes)->execute();
            return true;
        } catch (\Throwable $e) {
            Yii::$app->session->setFlash('saveError', $e->getMessage());
            return false;
        }
    }

    abstract function update(EntityInterface $entity);

    abstract function delete(EntityInterface $entity);

//    public function find($params = null){}
//
//    abstract function findAll($params = null);
}
<?php

namespace kosssi\SimpleTaskBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TaskRepository extends EntityRepository
{

    public function findAvailables()
    {
        return $this->createQueryBuilder()
            ->field('quantity')->gt(0)
            ->getQuery()
            ->execute();
    }

    public function findByIds(array $ids)
    {
        return $this->createQueryBuilder()
            ->field('_id')->in($ids)
            ->getQuery()
            ->execute();
    }

}
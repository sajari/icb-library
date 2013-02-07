<?php

namespace ICB\Impl\Repository\DoctrineORM;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use ICB\Domain\Repository\IndustryRepositoryInterface;

class IndustryRepository implements IndustryRepositoryInterface
{
    /**
     * @var string
     */
    private $entityClass = 'ICB\Impl\Entity\DoctrineORM\Industry';

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function findIndustry($id)
    {
        $query = $this->getRepository()
            ->createQueryBuilder('i')
            ->where('i.id = :id')
            ->setParameter('id', $id)
            ->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__, $id));

        return $query->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findIndustryByCode($code)
    {
        $query = $this->getRepository()
            ->createQueryBuilder('i')
            ->where('i.code = :code')
            ->setParameter('code', $code)
            ->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__, $code));

        return $query->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findIndustries()
    {
        $query = $this->getRepository()
            ->createQueryBuilder('i')
            ->orderBy('i.code', 'asc')
            ->getQuery();

        $query->useResultCache(true, 86400, $this->getCacheId(__METHOD__));

        return $query->getResult();
    }

    private function getCacheId($method, $data = '')
    {
        if (null !== $data && '' !== $data) {
            $data = ':' . sha1(serialize($data));
        } else {
            $data = '';
        }

        return str_replace(array('\\', '::', ':'), '_', mb_strtolower($method . $data, mb_detect_encoding($method . $data)));
    }

    /**
     * @return EntityRepository
     */
    private function getRepository()
    {
        return $this->entityManager->getRepository($this->entityClass);
    }
}

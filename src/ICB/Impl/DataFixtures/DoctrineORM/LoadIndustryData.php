<?php

namespace ICB\Impl\DataFixtures\DoctrineORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class LoadIndustryData implements FixtureInterface
{
    private $entityManager;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $objectManager)
    {
        if (!$objectManager instanceof EntityManager) {
            throw new \RuntimeException('Fixtures can only be loaded with an entity manager');
        }

        $this->entityManager = $objectManager;

        $sql = file_get_contents(__DIR__ . '/../../Resources/data_fixtures/2013_February_Industries.sql');

        $conn = $objectManager->getConnection();

        $conn->executeUpdate($sql);
    }
}

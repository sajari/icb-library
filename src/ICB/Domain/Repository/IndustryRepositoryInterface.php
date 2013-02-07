<?php

namespace ICB\Domain\Repository;

use ICB\Domain\Entity\IndustryInterface;

interface IndustryRepositoryInterface
{
    /**
     * Find the industry with the given ID.
     *
     * @param integer $id
     *
     * @return IndustryInterface|null
     */
    public function findIndustry($id);

    /**
     * Find the industry with the given code.
     *
     * @param string $code
     *
     * @return IndustryInterface|null
     */
    public function findIndustryByCode($code);

    /**
     * Return a collection of industries.
     *
     * @return IndustryInterface[]
     */
    public function findIndustries();
}

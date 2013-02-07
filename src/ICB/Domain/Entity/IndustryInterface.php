<?php

namespace ICB\Domain\Entity;

interface IndustryInterface
{
    /**
     * Get the ID.
     *
     * @return integer
     */
    public function getId();

    /**
     * Get the code of the industry.
     *
     * @return string
     */
    public function getCode();

    /**
     * Get the title.
     *
     * @return string
     */
    public function getTitle();
}

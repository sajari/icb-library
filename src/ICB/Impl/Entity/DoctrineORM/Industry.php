<?php

namespace ICB\Impl\Entity\DoctrineORM;

use ICB\Domain\Entity\IndustryInterface;

class Industry implements IndustryInterface
{
    /**
     * @var integer The internal ID
     */
    private $id;

    /**
     * @var string The ICB code
     */
    private $code;

    /**
     * @var string The ICB title
     */
    private $title;

    /**
     * @param string $code
     * @param string $title
     */
    public function __construct($code, $title)
    {
        $this->code = $code;
        $this->title = $title;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }
}

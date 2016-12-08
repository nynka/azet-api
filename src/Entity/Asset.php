<?php

namespace Azet\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Asset
 *
 * @ORM\Entity
 * @ORM\Table(name="asset", schema="azet")
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Entity
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class Asset
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="real_id", type="string", length=10, nullable=false)
     * @var string
     */
    private $realId;

    /**
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="type", type="integer", nullable=true)
     *
     * @var integer
     */
    private $type;

//    public function __construct($realId, $name, $type = null)
//    {
//        $this->realId = $realId;
//        $this->name = $name;
//        $this->type = $type;
//    }

    public function getId()
    {
        return $this->id;
    }

    public function getRealId()
    {
        return $this->realId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setRealId($realId)
    {
        $this->realId = $realId;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}

<?php

namespace Azet\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Booking
 *
 * @ORM\Entity
 * @ORM\Table(name="booking", schema="azet")
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Entity
 * @copyright (c) year, Media Research i Östersund AB
 */
class Booking
{
       /**
     * @ORM\Column(name="id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     * @var string
     */
    private $message;

    /**
     * @ORM\Column(name="from_date", type="date", nullable=true)
     */
    private $fromDate;

    /**
     * @ORM\Column(name="to_date", type="date", nullable=true)
     */
    private $toDate;

    /**
     * @ORM\ManyToOne(targetEntity="Asset")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="asset_id", referencedColumnName="id", nullable=false)
     * })
     * @var Asset
     */
    private $asset;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="by_id", referencedColumnName="id", nullable=false)
     * })
     * @var User
     */
    private $by;

    public function __construct($message, $fromDate, $toDate, Asset $asset, User $by)
    {
        $this->message = $message;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->asset = $asset;
        $this->by = $by;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getFromDate()
    {
        return $this->fromDate;
    }

    public function getToDate()
    {
        return $this->toDate;
    }

    public function getAsset()
    {
        return $this->asset;
    }

    public function getBy()
    {
        return $this->by;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
        return $this;
    }

    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
        return $this;
    }
}

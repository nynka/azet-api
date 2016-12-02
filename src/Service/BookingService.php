<?php

/*
 * Copyright (C) Media Research i Östersund AB - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Henric Nylund <henric.nylund@mediaresearch.se>, September 2016
 */

namespace Azet\Service;

use Azet\Entity\Booking;
use Doctrine\ORM\EntityManagerInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use DomainException;
use stdClass;
use Traversable;

/**
 * Description of UserService
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Service
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class BookingService implements MapperInterface
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $objectManager;

    /**
     *
     * @var Booking
     */
    protected $entityPrototype;

    /**
     *
     * @var DoctrineObject
     */
    protected $hydrator;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
        $this->hydrator = new DoctrineObject($this->objectManager);
        $this->entityPrototype = new Booking;
    }

    /**
     * Find an Booking by id.
     *
     * @param integer $id
     * @return Booking
     */
    public function fetch($id)
    {
        /* @var $asset Booking */
        $asset = $this->objectManager->getRepository(Booking::class)->find($id);
        return $asset;
    }

    /**
     * Find all the Bookings
     *
     * @return array
     */
    public function fetchAll()
    {
        $assets = $this->objectManager->getRepository(Booking::class)->findAll();
        return $assets;
    }

    /**
     * Create a new Booking
     *
     * @param array|Traversable|stdClass $data
     * @return Booking
     */
    public function create($data)
    {
        $message = $data->message;
        $fromDate = new \DateTime($data->to_date);
        $toDate = new \DateTime($data->from_date);
        $asset = null;
        $by = null;

        $entity = new Booking($message, $fromDate, $toDate, $asset, $by);

        $this->objectManager->persist($entity);
        $this->objectManager->flush();

        return $entity;
    }

    /**
     *
     * @param int $id
     * @return boolean
     * @throws DomainException
     */
    public function delete($id)
    {
        $entity = $this->fetch($id);

        if (! $entity) {
            throw new DomainException('Invalid identifier provided', 404);
        }

        $this->objectManager->remove($entity);
        $this->objectManager->flush();

        return true;
    }

    public function update($id, $data)
    {
        $entity = $this->fetch($id);

        if (! $entity) {
            throw new DomainException('Invalid identifier provided', 404);
        }

        $entity->setMessage($data->message)
            ->setToDate(new \DateTime($data->to_date))
            ->setFromDate(new \DateTime($data->from_date));

        $this->objectManager->persist($entity);
        $this->objectManager->flush();

        return $entity;
    }

}

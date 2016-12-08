<?php

namespace Azet\Service;

use Azet\Entity\Asset;
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
class AssetService implements MapperInterface
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $objectManager;

    /**
     *
     * @var Asset
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
        $this->entityPrototype = new Asset;
    }

    /**
     * Find an Asset by id.
     *
     * @param integer $id
     * @return Asset
     */
    public function fetch($id)
    {
        /* @var $asset Asset */
        $asset = $this->objectManager->getRepository(Asset::class)->find($id);
        return $asset;
    }

    /**
     * Find all the Assets
     *
     * @return array
     */
    public function fetchAll()
    {
        $assets = $this->objectManager->getRepository(Asset::class)->findAll();
        return $assets;
    }

    /**
     * Create a new Asset
     *
     * @param array|Traversable|stdClass $data
     * @return Asset
     */
    public function create($data)
    {
//        $asset = $this->hydrator->hydrate((array) $data, $this->entityPrototype);
//var_dump((array) $data); die;
        $asset = new Asset();
        $asset->setRealId($data->real_id)
                ->setName($data->name)
                ->setType($data->type);

        $this->objectManager->persist($asset);
        $this->objectManager->flush();

        return $asset;
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

        $entity->setRealId($data->real_id)
                ->setName($data->name)
                ->setType($data->type);

        $this->objectManager->persist($entity);
        $this->objectManager->flush();

        return $entity;
    }

}

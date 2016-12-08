<?php

namespace Azet\Factory\Service;

use Azet\Service\AssetService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Description of UserServiceFactory
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Factory\Service
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class AssetServiceFactory implements FactoryInterface
{
    /**
     * Create a AssetService
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     * @return AssetService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $objectManager \Doctrine\ORM\EntityManagerInterface */
        $objectManager = $container->get('doctrine.entitymanager.orm_azet');
//        $objectManager = $container->get('doctrine.entitymanager.orm_mruser');
        return new AssetService($objectManager);
    }

}

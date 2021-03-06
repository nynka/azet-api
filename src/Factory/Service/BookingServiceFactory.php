<?php

namespace Azet\Factory\Service;

use Azet\Service\BookingService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Description of UserServiceFactory
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Factory\Service
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class BookingServiceFactory implements FactoryInterface
{
    /**
     * Create a BookingService
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     * @return BookingService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $objectManager \Doctrine\ORM\EntityManagerInterface */
        $objectManager = $container->get('doctrine.entitymanager.orm_azet');
        return new BookingService($objectManager);
    }
}

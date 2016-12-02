<?php

/*
 * Copyright (C) Media Research i Östersund AB - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Henric Nylund <henric.nylund@mediaresearch.se>, September 2016
 */
namespace Azet\Factory\Service;

use Azet\Service\UserService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Description of UserServiceFactory
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Factory\Service
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class UserServiceFactory implements FactoryInterface
{
    /**
     * Create a UserService
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     * @return UserService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $objectManager \Doctrine\ORM\EntityManagerInterface */
        $objectManager = $container->get('doctrine.entitymanager.orm_azet');
//        $objectManager = $container->get('doctrine.entitymanager.orm_mruser');
        return new UserService($objectManager);
    }

}

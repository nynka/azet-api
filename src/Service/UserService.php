<?php

namespace Azet\Service;

use Azet\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Description of UserService
 *
 * @author Henric Nylund <henric.nylund@mediaresearch.se>
 * @package Azet\Service
 * @copyright (c) 2016, Media Research i Östersund AB
 */
class UserService
{
    /**
     *
     * @var EntityManagerInterface
     */
    protected $objectManager;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Find a user by id.
     *
     * @param integer $id
     * @return User
     */
    public function find($id)
    {
        /* @var $user User */
        $user = $this->objectManager->getRepository(User::class)->find($id);
        return $user;
    }

    /**
     * Find all the users
     *
     * @return array
     */
    public function findAll()
    {
        $users = $this->objectManager->getRepository(User::class)->findAll();
        return $users;
    }
}

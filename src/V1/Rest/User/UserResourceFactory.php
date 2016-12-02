<?php
namespace Azet\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
        /* @var $service \AdFinder\Service\UserService */
        $service= $services->get(\Azet\Service\UserService::class);

        return new UserResource($service);
    }
}

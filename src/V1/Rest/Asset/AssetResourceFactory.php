<?php
namespace Azet\V1\Rest\Asset;

class AssetResourceFactory
{
    public function __invoke($services)
    {
        /* @var $service \AdFinder\Service\AssetService */
        $service= $services->get(\Azet\Service\AssetService::class);

        return new AssetResource($service);
    }
}

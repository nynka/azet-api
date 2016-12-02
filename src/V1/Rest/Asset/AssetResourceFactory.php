<?php
namespace Azet\V1\Rest\Asset;

use Azet\Service\AssetService;

class AssetResourceFactory
{
    public function __invoke($services)
    {
        /* @var $service AssetService */
        $service = $services->get(AssetService::class);

        return new AssetResource($service);
    }
}

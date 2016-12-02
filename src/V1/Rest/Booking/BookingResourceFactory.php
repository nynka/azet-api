<?php
namespace Azet\V1\Rest\Booking;

use Azet\Service\BookingService;

class BookingResourceFactory
{
    public function __invoke($services)
    {
        /* @var $service BookingService */
        $service = $services->get(BookingService::class);

        return new BookingResource($service);
    }
}

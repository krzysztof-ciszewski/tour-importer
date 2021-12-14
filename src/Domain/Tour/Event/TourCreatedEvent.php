<?php

declare(strict_types=1);

namespace App\Domain\Tour\Event;

class TourCreatedEvent
{
    public function __construct(private string $tourId)
    {
    }

    public function getTourId(): string
    {
        return $this->tourId;
    }

}

<?php

declare(strict_types=1);

namespace App\Domain\Tour;

use App\Domain\AggregateRootInterface;
use App\Domain\Tour\Event\TourCreatedEvent;

class Tour implements AggregateRootInterface
{
    private string $id;
    /**
     * @var Asset[]
     */
    private array $assets;
    private string $destination;
    private array $events = [];

    public function __construct(string $id, string $destination, array $assets)
    {
        $this->id = $id;
        $this->destination = $destination;
        $this->assets = $assets;
        $this->events[] = new TourCreatedEvent($id);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getAssets(): array
    {
        return $this->assets;
    }

    public function getDomainEvents(): array
    {
        return $this->events;
    }
}

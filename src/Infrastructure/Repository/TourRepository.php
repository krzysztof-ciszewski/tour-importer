<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\EventDispatcherInterface;
use App\Domain\Tour\Repository\TourRepositoryInterface;
use App\Domain\Tour\Tour;

class TourRepository implements TourRepositoryInterface
{
    public function __construct(
        private $db,
        private EventDispatcherInterface $dispatcher
    ) {
    }

    public function save(Tour $tour): void
    {
        $this->db->save($tour);
        $this->dispatcher->dispatch($tour->getDomainEvents());
    }
}

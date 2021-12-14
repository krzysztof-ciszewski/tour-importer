<?php

declare(strict_types=1);

namespace App\Domain\Tour\Repository;

use App\Domain\Tour\Tour;

interface TourRepositoryInterface
{
    public function save(Tour $tour): void;
}

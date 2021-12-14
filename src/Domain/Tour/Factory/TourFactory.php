<?php

declare(strict_types=1);

namespace App\Domain\Tour\Factory;

use App\Domain\Tour\Asset;
use App\Domain\Tour\Tour;

class TourFactory
{
    public function create(string $id, array $data): Tour
    {
        $assets = [];
        foreach ($data['assets'] as $asset) {
            $assets[] = new Asset($asset['location'], $asset['name']);
        }

        return new Tour($id, $data['destination'], $assets);
    }
}

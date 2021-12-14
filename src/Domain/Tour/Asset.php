<?php

declare(strict_types=1);

namespace App\Domain\Tour;

class Asset
{
    public function __construct(
        private string $location,
        private string $name
    ) {
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

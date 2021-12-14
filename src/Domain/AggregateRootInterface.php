<?php

declare(strict_types=1);

namespace App\Domain;

interface AggregateRootInterface
{
    public function getId(): string;

    public function getDomainEvents(): array;
}

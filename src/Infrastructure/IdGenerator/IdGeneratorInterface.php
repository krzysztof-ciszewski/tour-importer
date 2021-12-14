<?php

declare(strict_types=1);

namespace App\Infrastructure\IdGenerator;

interface IdGeneratorInterface
{
    public function generate(): string;
}

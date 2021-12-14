<?php

declare(strict_types=1);

namespace App\Infrastructure\IdGenerator;

use Ramsey\Uuid\Uuid;

class IdGenerator implements IdGeneratorInterface
{
    public function generate(): string
    {
        return (string) Uuid::uuid4();
    }
}

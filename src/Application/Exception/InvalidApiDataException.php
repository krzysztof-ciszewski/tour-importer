<?php

declare(strict_types=1);

namespace App\Application\Exception;

use RuntimeException;

class InvalidApiDataException extends RuntimeException
{
    private array $data;

    public function __construct(string $message, array $data)
    {
        parent::__construct($message);
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

<?php

declare(strict_types=1);

namespace App\Application\Validator;

use App\Application\Exception\InvalidApiDataException;

class TourApiDataValidator
{
    public function validate(array $data): void
    {
        if (! isset($data['assets'], $data['destination']) || ! is_array($data['assets'])) {
            throw new InvalidApiDataException('Missing required data in api response', $data);
        }
        foreach ($data['assets'] as $asset) {
            if (! isset($asset['location'], $asset['name'])) {
                throw new InvalidApiDataException('Missing required data in api response', $data);
            }
        }
    }
}

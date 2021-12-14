<?php

declare(strict_types=1);

namespace App\Infrastructure\ApiClient;

use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient implements ApiClientInterface
{
    public function __construct(
        private string $url,
        private HttpClientInterface $httpClient,
        private LoggerInterface $logger
    ) {
    }

    public function getTourData(): array
    {
        try {
            return $this->httpClient->request('GET', $this->url)->toArray(true);
        } catch (Exception $e) {
            $this->logger->error(
                sprintf(
                    'Error occurred when trying to fetch response from "%s". Exception "%s" was thrown with message "%s"',
                    $this->url,
                    get_class($e),
                    $e->getMessage()
                ),
                ['exception' => $e, 'trace' => debug_backtrace()]
            );
        }
    }
}

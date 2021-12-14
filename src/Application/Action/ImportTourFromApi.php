<?php

declare(strict_types=1);

namespace App\Application\Action;

use App\Application\Validator\TourApiDataValidator;
use App\Domain\Tour\Factory\TourFactory;
use App\Domain\Tour\Repository\TourRepositoryInterface;
use App\Infrastructure\ApiClient\ApiClientInterface;
use App\Infrastructure\IdGenerator\IdGeneratorInterface;
use Exception;
use Psr\Log\LoggerInterface;

class ImportTourFromApi
{
    public function __construct(
        private ApiClientInterface $apiClient,
        private TourFactory $tourFactory,
        private TourRepositoryInterface $repository,
        private IdGeneratorInterface $idGenerator,
        private TourApiDataValidator $validator,
        private LoggerInterface $logger
    ) {
    }

    public function __invoke(): void
    {
        try {
            $data = $this->apiClient->getTourData();
            $this->validator->validate($data);
            $tour = $this->tourFactory->create($this->idGenerator->generate(), $data);
            $this->repository->save($tour);
        } catch (Exception $e) {
            $this->logger->error(
                sprintf('Exception of type "%s" with message "%s" occurred', get_class($e), $e->getMessage()),
                ['exception' => $e, 'trace' => debug_backtrace()]
            );
        }
    }
}

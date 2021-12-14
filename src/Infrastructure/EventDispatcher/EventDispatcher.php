<?php

declare(strict_types=1);

namespace App\Infrastructure\EventDispatcher;

use App\Domain\EventDispatcherInterface;
use Symfony\Component\Messenger\MessageBus;

class EventDispatcher implements EventDispatcherInterface
{
    public function __construct(
        private MessageBus $bus
    ) {
    }

    public function dispatch(array $events): void
    {
        foreach ($events as $event) {
            $this->bus->dispatch($event);
        }
    }
}

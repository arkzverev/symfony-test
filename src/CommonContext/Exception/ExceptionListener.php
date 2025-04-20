<?php

declare(strict_types=1);

namespace App\CommonContext\Exception;

use App\Exception\ApiBaseException;
use App\Exception\ErrorCodes;
use App\Exception\ServiceBaseException;
use App\Exception\UnprocessableRequestQueryException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        dd($exception);
    }
}

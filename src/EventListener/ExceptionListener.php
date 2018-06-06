<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:58
 */

namespace App\EventListener;


use App\Domain\Shared\Exceptions\DomainError;
use App\Infrastructure\Utils\MyOwnHttpCodes;
use Assert\InvalidArgumentException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $response = new JsonResponse();

        switch (true){
            case $exception instanceof InvalidArgumentException:
                $response->setStatusCode(MyOwnHttpCodes::HTTP_BAD_REQUEST);
                $response->setData(['message' => $exception->getMessage()]);
                break;
            case $exception instanceof DomainError:
                $response->setStatusCode($exception->statusCode());
                $response->setData(['message' => $exception->statusMessage()]);
                break;
            case $exception instanceof \ErrorException:
                $response->setStatusCode(MyOwnHttpCodes::HTTP_BAD_REQUEST);
                $response->setData(['message' => $exception->getMessage()]);
                break;
        }

        $event->setResponse($response);
    }
}
<?php

namespace Project5\Middleware;

use InvalidArgumentException;
use Monolog\Logger;
use Project5\Exception\InvalidException;
use Psr\Log\LoggerInterface;
use Slim\App;
use Slim\Psr7\Request;
use Throwable;

class CustomErrorHandler
{
    private Logger $logger;

    public function __construct(private App $app)
    {
        $this->logger = $this->app->getContainer()->get('logger');
    }
    public function __invoke(
        Request $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    ) {
        $payload = $this->getPayload($exception);

        if ($displayErrorDetails) {
            $payload['details'] = $exception->getMessage();
        }

        $response = $this->app->getResponseFactory()->createResponse();
        $response->getBody()->write(
            json_encode($payload, JSON_UNESCAPED_UNICODE)
        );

        return $response->withStatus($payload['status_code']);
    }
    private function getPayload(Throwable $exception): array
    {
        if ($exception instanceof InvalidException) {
            $this->logger->debug(json_encode($exception->getErrors()));
            return [
                'errors' => $exception->getErrors(),
                'code' => 'validation_exception',
                'id' => 'invalid_data_exception',
                'status_code' => 400,
            ];
        }
        if ($exception instanceof InvalidArgumentException) {
            $this->logger->debug(json_encode($exception->getMessage()));
            return [
                'errors' => $exception->getMessage(),
                'id' => 'invalid_data_exception',
                'status_code' => 404,
            ];
        }
        $this->logger->error($exception->getMessage());
        return [
            'error' => 'Oops... Something went wrong, please try again later.',
            'code' => 'internal_error',
            'status_code' => 500,
        ];
    }

}
<?php

declare(strict_types=1);

namespace App\CommonContext\Validator;

use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestJsonValidator
{
    public function __construct(
        private ValidatorInterface $validator,
        private SerializerInterface $serializer,
        private LoggerInterface $logger,
    ) {
    }

    public function parseJsonToDto(string $json, $classDto): array
    {
        try {
            $requestDto = $this->serializer->deserialize($json, $classDto, 'json');
            $errors = $this->validator->validate($requestDto);
            if (count($errors) > 0) {
                return [
                    'status' => false,
                    'error' => $this->getErrorsMessage($errors),
                ];
            }
        } catch (NotNormalizableValueException $exception) {
            $this->logger->error('Create client API request error: ' . $exception->getMessage());
            return [
                'status' => false,
                'error' => 'Bad Request: ' . $exception->getMessage(),
            ];
        }

        return [
            'status' => true,
            'dto' => $requestDto,
        ];
    }

    public function getErrorsMessage(ConstraintViolationListInterface $errors): array
    {
        $result = [];
        foreach ($errors as $error) {
            $result[] = $error->getPropertyPath() . ' = ' . $error->getinvalidValue() . ': ' . $error->getMessage();
        }

        return $result;
    }
}
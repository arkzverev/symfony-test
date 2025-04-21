<?php

declare(strict_types=1);

namespace App\ClientContext\Facade\Actions;

use App\Annotation\ReferencedResponse;
use App\ClientContext\Facade\Dto\CreateClientDto;
use App\ClientContext\Service\Client\ClientService;
use App\CommonContext\Controller\BaseRestController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Webmozart\Assert\Assert;
use App\CommonContext\Validator\RequestJsonValidator;

final class CreateClientActionController extends BaseRestController
{
    public function __construct(
        private RequestJsonValidator $validator,
        private SerializerInterface $serializer,
        private LoggerInterface $logger,
        private ClientService $clientService,
    ) {
    }

    public function v1(Request $request): Response
    {
        $result = $this->validator->parseJsonToDto($request->getContent(), CreateClientDto::class);

        Assert::keyExists($result, 'status');
        if (!$result['status']) {
            Assert::keyExists($result, 'error');
            return $this->createResponse($result, Response::HTTP_BAD_REQUEST);
        }

        Assert::keyExists($result, 'dto');
        $newClient = $this->clientService->createClient($result['dto']);

        return $this->createResponse(
            $newClient->exportArray(),
            Response::HTTP_CREATED,
        );
    }
}
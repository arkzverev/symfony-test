<?php

declare(strict_types=1);

namespace App\CreditContext\Facade\Actions;

use App\CommonContext\Controller\BaseRestController;
use App\CommonContext\Validator\RequestJsonValidator;
use App\CreditContext\Facade\Dto\CreateCreditDto;
use App\CreditContext\Service\CreditService;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Webmozart\Assert\Assert;

final class CreateCreditActionController extends BaseRestController
{
    public function __construct(
        private RequestJsonValidator $validator,
        private SerializerInterface $serializer,
        private LoggerInterface $logger,
        private CreditService $creditService,
    ) {
    }

    public function v1(Request $request): Response
    {
        $result = $this->validator->parseJsonToDto($request->getContent(), CreateCreditDto::class);

        Assert::keyExists($result, 'status');
        if (!$result['status']) {
            Assert::keyExists($result, 'error');
            return $this->createResponse($result, Response::HTTP_BAD_REQUEST);
        }

        Assert::keyExists($result, 'dto');
        $creditResult = $this->creditService->createCredit($result['dto']);
        if (!$creditResult['status']) {
            return $this->createResponse(
                $creditResult,
                Response::HTTP_BAD_REQUEST,
            );
        }

        return $this->createResponse(
            $creditResult,
            Response::HTTP_CREATED,
        );
    }
}
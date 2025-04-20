<?php

declare(strict_types=1);

namespace App\CommonContext\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseRestController extends AbstractController
{
    public function createResponse(array $data, int $statusCode): Response
    {
        return new Response(
            json_encode($data),
            $statusCode,
            ['content-type' => 'application/json']
        );
    }
}
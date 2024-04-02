<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

abstract class AbstractApiController extends Controller
{
    public function __construct(protected readonly ResponseFactory $responseFactory)
    {
    }

    protected function buildSuccessResponse(array $data = [], int $statusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        return $this->responseFactory->json($data, $statusCode);
    }
}

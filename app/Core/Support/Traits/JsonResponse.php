<?php

namespace App\Core\Support\Traits;

trait JsonResponse
{
    protected function successResponse(string $message, int $code = 200, array $options = [])
    {
        return response()->json([
            'message' => $message,
            $options
        ], $code);
    }

    protected function errorResponse(\Throwable $e, int $code = 500)
    {
        return response()->json([
            'error' => [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]
        ], $code);
    }
}

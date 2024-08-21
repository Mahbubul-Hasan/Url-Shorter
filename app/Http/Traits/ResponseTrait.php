<?php

namespace App\Http\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait {

    public function responseMessage($type, $message) {
        session()->flash('type', $type);
        session()->flash('message', $message);
    }

    /**
     * @param int $message
     * @param int $statusCode
     * @param object|array $data
     * @param object|array $errors
     * @return \Illuminate\Http\JsonResponse
     */

    public function responseJsonMessage(string $message, int $statusCode = Response::HTTP_OK, array|object $data = null, object $errors = null) {
        $responseData = [
            "message"     => $message,
            "data"        => $data,
            "status_code" => $statusCode,
            "errors"      => $errors,
        ];

        return response()->json(
            $responseData,
            $statusCode
        );
    }
}

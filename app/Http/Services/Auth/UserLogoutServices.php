<?php

namespace App\Http\Services\Auth;

use Illuminate\Http\Response;
use App\Http\Traits\ResponseTrait;

class UserLogoutServices {
    use ResponseTrait;
    public function logout($request) {
        try {
            $request->user()->tokens()->delete();
            return $this->responseJsonMessage('Logout successfully!', Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->responseJsonMessage($th->getMessage(), Response::HTTP_BAD_REQUEST, null, $th);
        }
    }
}

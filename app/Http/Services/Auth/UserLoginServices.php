<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;

class UserLoginServices {
    use ResponseTrait;
    public function login($request) {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->responseJsonMessage('Wrong email address or password. Please try again', Response::HTTP_BAD_REQUEST);
            }

            $token = $user->createToken($request->email);
            $data  = [
                'user'  => $user,
                'token' => $token->plainTextToken,
            ];
            return $this->responseJsonMessage('Login successfully!', Response::HTTP_OK, $data);
        } catch (\Throwable $th) {
            return $this->responseJsonMessage($th->getMessage(), Response::HTTP_BAD_REQUEST, null, $th);
        }
    }
}

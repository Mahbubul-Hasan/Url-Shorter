<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Traits\ResponseTrait;

class UserRegisterServices {
    use ResponseTrait;
    public function saveRequest($request) {
        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $user->assignRole("User");
            $token = $user->createToken($request->email);
            $data  = [
                'user'  => $user,
                'token' => $token->plainTextToken,
            ];
            return $this->responseJsonMessage('Registered successfully!', Response::HTTP_OK, $data);
        } catch (\Throwable $th) {
            return $this->responseJsonMessage($th->getMessage(), Response::HTTP_BAD_REQUEST, null, $th);
        }
    }
}

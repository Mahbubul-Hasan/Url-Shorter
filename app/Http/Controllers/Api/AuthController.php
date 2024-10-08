<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Services\Auth\UserLoginServices;
use App\Http\Services\Auth\UserLogoutServices;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Services\Auth\UserRegisterServices;

class AuthController extends Controller {

    /**
     * User registration
     * @OA\Post(
     *      path="/api/auth/register",
     *      summary="User Registration",
     *      description="",
     *      operationId="register",
     *      tags={"Authentication"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="",
     *          @OA\JsonContent(
     *              required={"name", "email", "password", "password_confirmation"},
     *              @OA\Property(property="name", type="string", example="Jone Doe"),
     *              @OA\Property(property="email", type="string", pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$", format="email", example="jone@gmail.com"),
     *              @OA\Property(property="password", type="string", example="123456"),
     *              @OA\Property(property="password_confirmation", type="string", example="123456"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Registered successfully!")
     *         )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *          )
     *      )
     * )
     */

    public function register(UserRegisterRequest $request, UserRegisterServices $service) {
        return $service->saveRequest($request);
    }

    /**
     * User login
     * @OA\Post(
     *      path="/api/auth/login",
     *      summary="User login",
     *      description="",
     *      operationId="login",
     *      tags={"Authentication"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="",
     *          @OA\JsonContent(
     *              required={"email", "password"},
     *              @OA\Property(property="email", type="string", pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$", format="email", example="jone@gmail.com"),
     *              @OA\Property(property="password", type="string", example="123456"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Login successfully!")
     *         )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *          )
     *      )
     * )
     */

    public function login(UserLoginRequest $request, UserLoginServices $service) {
        return $service->login($request);
    }

    /**
     * User logout
     * @OA\Post(
     *      path="/api/auth/logout",
     *      summary="User logout",
     *      description="",
     *      operationId="logout",
     *      tags={"Authentication"},
     *      security={ {"authToken": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Logout successfully!")
     *         )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Something wrong. Please try again")
     *          )
     *      )
     * )
     */

    public function logout(Request $request, UserLogoutServices $service) {
        return $service->logout($request);
    }
}

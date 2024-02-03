<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Services\UserService;
use App\Http\Responsables\JsonApiResponse;

class AuthController extends Controller
{
    private UserService $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(AuthRegisterRequest $request) 
    {
        try 
        {
            $user = $this->userService->create($request->validated());
            $token = $this->userService->createToken($user);

            return new JsonApiResponse(
                true, 
                __('auth.success_create_user'),
                ['token' => $token],
                201
            );
        } 
        catch (\Throwable $th) 
        {
            return new JsonApiResponse(
                false, 
                __('auth.failed_create_user'),
                ['error' => $th->getMessage()],
                500
            );
        }
    }

    public function login(AuthLoginRequest $request)
    {
        try {
            if(!$this->userService->isUserRegistered($request))
            {
                return new JsonApiResponse(
                    false,
                    __('auth.failed_login'),
                    [],
                    401
                );
            }

            $user = $this->userService->getUserByEmail($request->email);
            $token = $this->userService->createToken($user);

            return new JsonApiResponse(
                true, 
                __('auth.success_login'),
                [
                    'token' => $token,
                    'user' => $user
                ],
                200
            );
        } catch (\Throwable $th) {
            return new JsonApiResponse(
                false, 
                __('auth.error_login'),
                ['error' => $th->getMessage()],
                500
            );
        }
    }
}

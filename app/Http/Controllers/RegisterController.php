<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

        public $userService;

        public function __construct(UserService $userService) {
            $this->userService = $userService;
        }

        public function registrar (RegisterRequest $request)
        {
            $userPayload = $request->validated();
            $user = $this->userService->registrarUsuario($userPayload);

            return $user ? response()->json(RegisterResource::make($user), 201)
                   : response()->json('Erro ao criar a conta', 400);
        }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(userService $userService) {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->all($request);
    }

    public function register(Request $request): JsonResponse
    {
        return $this->userService->register($request);
    }

    public function login(Request $request): JsonResponse
    {
        return $this->userService->login($request);
    }

    public function show(int $id): JsonResponse
    {
        return $this->userService->getUserById($id);
    }

    public function update(UserRequest $request, int $id): JsonResponse
    {
        return $this->userService->updateUser($request,$id);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->userService->deleteUser($id);
    }

}

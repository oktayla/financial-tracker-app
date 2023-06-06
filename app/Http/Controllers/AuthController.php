<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseBuilder;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        public UserService $userService
    ) {
    }

    /**
     * Perform the register operation.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(
        RegisterRequest $request
    ): JsonResponse {
        $user = $this->userService->create($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'success' => true,
            'result' => UserResource::make($user),
        ];

        return ResponseBuilder::ok($response)
            ->withCookie('token', $token, 60 * 24 * 7);
    }

    /**
     * Perform the login operation.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(
        LoginRequest $request
    ): JsonResponse {
        $data = $request->validated();

        if (!$this->userService->checkCredentials($data)) {
            return ResponseBuilder::unauthorized([
                'success' => false,
                'message' => 'Invalid credentials!',
            ]);
        }

        $user = $this->userService->getByEmail($data['email']);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = [
            'success' => true,
            'result' => UserResource::make($user)->additional([
                'overview' => $this->userService->getOverview($user->id),
            ]),
        ];

        return ResponseBuilder::ok($response)
            ->withCookie('token', $token, 60 * 24 * 7);
    }

    /**
     * Perform the logout operation.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return ResponseBuilder::ok(['message' => 'Successfully logged out!'])
            ->withoutCookie('token');
    }

    /**
     * Get the authenticated User.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function user(
        Request $request
    ): JsonResponse {
        $userOverview = $this->userService->getOverview();

        return ResponseBuilder::ok(
            UserResource::make($request->user())->additional([
                'overview' => $userOverview,
            ])
        );
    }
}

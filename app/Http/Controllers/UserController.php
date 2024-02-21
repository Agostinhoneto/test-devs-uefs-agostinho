<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Requests\StoreUserRequest;
use App\Services\UsersService;
use Exception;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UsersService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     operationId="getUsersList",
     *     tags={"Users"},
     *     summary="Get list of users",
     *     description="Returns a list of users",
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Bad request")
     * )
     */
    
    public function index()
    {
        $limit = 10;
        try {
            $result['data'] = $this->userService->getAll($limit);
            return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->userService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function store(StoreUserRequest $request)
    {
        $result['data'] = $this->userService->createUser(
            $request->name,
            $request->email,
            $request->password,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function update(StoreUserRequest $request, $id)
    {
        $result['data'] = $this->userService->updateUser(
            $request->id,
            $request->name,
            $request->email,
            $request->password,
        );
        return response()->json([Messages::UPDATE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function destroy($id)
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->userService->destroyUser($id);
            return response()->json([Messages::DELETE_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}

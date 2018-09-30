<?php

namespace App\Http\Controllers;

use App\Exceptions\JsonException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use App\User;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getPage();

        return response()->json([
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return User
     * @throws \Throwable
     */
    public function store(UserCreateRequest $request)
    {
        $attributes = $request->only('name', 'email', 'password', 'company');

        try {
            $user = $this->userService->create($attributes);
            return response()->json([
                'user' => $user
            ]);

        } catch (\Exception $e) {
            throw new JsonException('can not be saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResource
     */
    public function show($id)
    {
        $user = $this->userService->getById($id);

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $attributes = $request->only('name','email', 'password');

        try {
            $user = $this->userService->updateById($attributes, $id);

            return response()->json([
                'user' => $user
            ]);
        } catch (\Exception $e) {
            throw new JsonException('can not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return int
     * @throws Exception
     */
    public function destroy($id)
    {
        $isDeleted = $this->userService->destroyById($id);
        if ($isDeleted) {
            return response()->json([
                'deleted' => true
            ]);
        }
        throw new JsonException('can not be deleted');
    }

}
        
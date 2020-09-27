<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate(10));
    }
    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json(array_merge(['status' => 'success'],
            (new UserResource($user))->resolve()));
    }


    /**
     * @param StoreUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUser $request)
    {
        $user = new User($request->validated());
        $user->password = Hash::make(Arr::get($request->validated(),'password'));
        $user->save();

        return response()->json(array_merge(
            ['status' => 'success', 'message' => 'The user was successfully created'],
            (new UserResource($user))->resolve()));
    }


    /**
     * @param User $user
     * @param UpdateUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(User $user, UpdateUser $request)
    {
        $user->update($request->validated());

        return response()->json(array_merge(
            ['status' => 'success', 'message' => 'The user was successfully updated'],
            (new UserResource($user))->resolve()));
    }


    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
            $user->delete();

            // TODO Soft delete
            return response()->json(array_merge(
                ['status' => 'success', 'message' => 'The user was successfully deleted'],
                (new UserResource($user))->resolve()));
    }
}

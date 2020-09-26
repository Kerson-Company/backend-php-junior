<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }

    /**
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUser $request)
    {
        $user = new User($request->validated());
        $user->password = Hash::make(Arr::get($request->validated(),'password'));
        $user->save();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'The user was successfully created']
        );
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, UpdateUser $request)
    {
        $user->update($request->validated());

        return response()->json(
            [
                'status' => 'success',
                'message' => 'The user was successfully updated']
        );
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
            $user->delete();
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'The user was successfully deleted'
                ]
            );
    }
}

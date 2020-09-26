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
            ['message' => 'Usuário criado com sucesso.']
        );
    }

    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, UpdateUser $request)
    {

        //dd(request()->all());
        //dd($user);
        $user->update($request->validated());

        return response()->json(
            ['message' => 'The user was successfully updated']
        );
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(
                ['message' => 'The user was successfully deleted']
            );
        } catch (\Exception $e) {
            return response()->json(
                ['message' => 'It was not possible to delete the user. Try again later.']
            );
        }
    }

    /**
     * @return array
     */
    private function validateUser(User $user)
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'cpf' => 'required|unique:users|min:11|max:11',
            'password' => 'required',
        ]);
    }
}

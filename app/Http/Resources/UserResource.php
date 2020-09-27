<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = auth()->user();

        return [
            "User" =>
                [
                    "id" => $user->id,
                    "name" => $user->name,
                    "cpf" => $user->cpf,
                    "email" => $user->email,
                    "createdAt" => $user->created_at,
                    "updatedAt" => $user->updated_at
                ]
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'username' => $this->user_name,
            'email' => $this->email,
            'gender' => $this->gender
        ];
    }
}

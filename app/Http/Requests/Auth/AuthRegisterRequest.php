<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Traits\RequestIsAuthorized;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    use RequestIsAuthorized;

    public function rules(): array
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ];
    }
}

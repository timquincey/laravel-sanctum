<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use App\Http\Traits\RequestIsAuthorized;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    use RequestIsAuthorized;

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}

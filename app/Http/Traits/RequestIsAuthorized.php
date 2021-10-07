<?php

declare(strict_types=1);

namespace App\Http\Traits;

trait RequestIsAuthorized
{
    public function authorize(): bool
    {
        return true;
    }
}

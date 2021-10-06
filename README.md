## Laravel Sanctum Setup

- `composer require laravel/sanctum`
- `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
- Setup database details within .env
- `php artisan migrate`
- Update `Http/Kernel.php` to uncomment - `\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,`

## Routes

- Register new user: POST `/api/register`

```
{
    "name": "Name",
    "email": "example@me.com",
    "password": "password",
    "password_confirmation": "password"
}
```

- Logout user and destroy tokens: POST `/api/logout`

- Login user: POST `/api/login`

```
{
    "name": "Name",
    "password": "password",
}
```

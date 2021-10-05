## Laravel Sanctum Setup

- `composer require laravel/sanctum`
- `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
- Setup database details within .env
- `php artisan migrate`
- Update `Http/Kernel.php` to uncomment - `\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,`

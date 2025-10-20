<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Dish;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        $this->registerPolicies();
        // Определение Gate для редактирования рецепта
        Gate::define('update-dish', function ($user, Dish $dish) {
            return $user->id === $dish->user_id; // сравниваем id пользователя и поля user_id
        });

        // Определение Gate для удаления рецепта
        Gate::define('delete-dish', function ($user, Dish $dish) {
            return $user->id === $dish->user_id;
        });
    }
}

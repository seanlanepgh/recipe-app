<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\Interfaces\AuthRepositoryInterface',
            'App\Repositories\AuthRepository'
        );

        $this->app->bind(
            'App\Services\Interfaces\AuthServiceInterface',
            'App\Services\AuthService'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Services\Interfaces\CategoryServiceInterface',
            'App\Services\CategoryService'
        );

        $this->app->bind(
            'App\Repositories\Interfaces\IngredientRepositoryInterface',
            'App\Repositories\IngredientRepository'
        );

        $this->app->bind(
            'App\Services\Interfaces\IngredientServiceInterface',
            'App\Services\IngredientService'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RecipeRepositoryInterface',
            'App\Repositories\RecipeRepository'
        );

        $this->app->bind(
            'App\Services\Interfaces\RecipeServiceInterface',
            'App\Services\RecipeService'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

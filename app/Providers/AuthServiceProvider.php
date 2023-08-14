<?php

namespace App\Providers;

use App\Models\category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        #define gates for edit
        Gate::define('edit-category', function (User $user, category $category) {
            return $user->id === $category->user_id;
        });
        #define gate for delete
        Gate::define('delete-category', function (User $user, category $category) {
            return $user->id === $category->user_id;
        });
    }
}

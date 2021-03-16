<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts' , 'App\Policies\PostPolicy');

        Gate::define('admins.index' , 'App\Policies\PostPolicy@admin_index');
        Gate::define('admins.create' , 'App\Policies\PostPolicy@admin_create');
        Gate::define('admins.update' , 'App\Policies\PostPolicy@admin_update');
        Gate::define('admins.delete' , 'App\Policies\PostPolicy@admin_delete');

        Gate::define('codifier.index' , 'App\Policies\PostPolicy@codifier_index');
        Gate::define('codifier.create' , 'App\Policies\PostPolicy@codifier_create');
        Gate::define('codifier.update' , 'App\Policies\PostPolicy@codifier_update');
        Gate::define('codifier.delete' , 'App\Policies\PostPolicy@codifier_delete');

        Gate::define('logement.index' , 'App\Policies\PostPolicy@logement_index');
        Gate::define('logement.create' , 'App\Policies\PostPolicy@logement_create');
        Gate::define('logement.update' , 'App\Policies\PostPolicy@logement_update');
        Gate::define('logement.delete' , 'App\Policies\PostPolicy@logement_delete');
    }
}

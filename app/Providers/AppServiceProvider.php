<?php

namespace App\Providers;

use App\Http\Interfaces\AboutUserInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ProjectInterface;
use App\Http\Interfaces\UserCertficateInterface;
use App\Http\Repositories\AboutUserRepository;
use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\ProjectRepository;
use App\Http\Repositories\UserCertficateIRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        

        $this->app->singleton(AuthInterface::class, AuthRepository::class);
        $this->app->singleton(ProjectInterface::class, ProjectRepository::class);
        $this->app->singleton(AboutUserInterface::class, AboutUserRepository::class);
        $this->app->singleton(UserCertficateInterface::class, UserCertficateIRepository::class);
    }

    public function boot(): void
    {
    }
}

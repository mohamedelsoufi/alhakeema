<?php

namespace App\Providers;

use App\Interfaces\TaskInterface;
use App\Interfaces\UserInterface;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(TaskInterface::class,TaskRepository::class);
    }
}

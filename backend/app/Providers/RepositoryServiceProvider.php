<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories_dir_path = dirname(__DIR__) . '/Repositories' ;

        $list_file_name_repositories = scandir($repositories_dir_path);

        foreach ($list_file_name_repositories as $repository_file_name)
        {
            if (strpos($repository_file_name, 'Repository') !== false) {
                $repository_class_name = explode (".", $repository_file_name)[0];

                $interface_class = "App\Contracts\\" . $repository_class_name . "Contract";
                $repository_class = "App\Repositories\\" . $repository_class_name;

                $this->app->bind($interface_class, $repository_class);
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

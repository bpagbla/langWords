<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!Schema::hasTable('words')) {
            // if the table doesn't exit, use migration to create
            Artisan::call('migrate');

        }
            // use seeder to fill the table
            Artisan::call('db:seed', [
                '--class' => \Database\Seeders\WordSeeder::class
            ]);
        
    }

    public function register()
    {
        //
    }
}


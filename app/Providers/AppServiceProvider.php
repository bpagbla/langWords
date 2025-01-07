<?php
namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
         // check if words table is empty
         if (DB::table('words')->count() == 0) {
            // use seeder to fill the table with the json
            Artisan::call('db:seed', [
                '--class' => \Database\Seeders\WordSeeder::class
            ]);
        }
    }

    public function register()
    {
        //
    }
}


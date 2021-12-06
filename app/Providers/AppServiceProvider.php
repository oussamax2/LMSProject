<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\companies;
use App\Models\courses;
use App\Models\sessions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['companies'] =companies::where('status',2)->count();
        $data['courses'] = courses::count();
        $data['sessions'] = sessions::count();

        view()->share('footer',$data);
    }
}

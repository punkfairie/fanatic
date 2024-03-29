<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Relation::enforceMorphMap([
            'joined' => 'App\Models\Joined',
            'owned'  => 'App\Models\Owned',
            'wish'   => 'App\Models\Wish',
        ]);

        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.simple-default');

        DB::connection()->setQueryGrammar(new \App\Database\Query\Grammars\MySqlGrammar());
    }
}

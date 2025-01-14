<?php

namespace App\Providers;

use App\Services\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Data\Foo;
use App\Data\Bar;
use App\Services\HelloService;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [ HelloService::class => HelloServiceIndonesia::class];
    public function register()
    {
        $this->app->singleton(Foo::class,function(){
            return new Foo();
        });
        $this->app->singleton(Bar::class,function($app){
            return new Bar($app->make(Foo::class));
        });
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides()
    {
        return [Foo::class,Bar::class,HelloService::class];
    }
}

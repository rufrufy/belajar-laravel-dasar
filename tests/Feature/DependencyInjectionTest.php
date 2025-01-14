<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependencyInjection()
    {
        $this->app->singleton(abstract: Foo::class,function($app){
            return new Foo();
        });
        $foo =$this->app->make(Foo::class);
        $bar =$this->app->make(Bar::class);
        self::assertSame(expected: $foo, $bar->foo);
    }
}

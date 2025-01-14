<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{


    public function testBind()
    {
        $this->app->singleton(Person::class, function($app){
            return new Person("Eko","Khannedy");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertSame($person1, $person2);
    }
    public function testInteraceToClass(){
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals('Halo Eko', $helloService->hello('Eko'));
    }


}

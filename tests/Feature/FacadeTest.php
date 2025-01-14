<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FacadeTest extends TestCase
{

    public function testConfig()
    {
        $firstname = config('contoh.author.first');
        $firstname2 = Config::get('contoh.author.first');

        self::assertEquals($firstname, $firstname2);
    }
}

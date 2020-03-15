<?php

namespace Tests\Unit;

use App\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    */
    public function link_always_generate_unique_short_code()
    {
        for ($i = 0; $i < 10000; $i++) {
            $characters = str_repeat('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 5);

            $codes[] = substr(str_shuffle($characters), 0, 5);
        }

        $this->assertCount(10000, array_unique($codes));
    }
    
    /**
    * @test
    */
    public function link_provides_short_url()
    {
        $url =  'https://google.co.in';
        $link =  Link::create(['url' =>$url]);

        $this->get($link->shortenLink)->assertRedirect($url);
    }
}

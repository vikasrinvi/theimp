<?php

namespace Tests\Feature;

use App\Link;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    /**
    * @test
    */
    public function short_link_can_be_generated_for_given_url()
    {
        $this->assertCount(0,Link::all());

        $this->post('/links',['url'=>$this->faker->url])->assertStatus(201);
        
        $this->assertCount(1,Link::all());
    }
    
    /**
     * @test
     */
    public function shorten_link_redirects_to_original_link()
    {
        $url = $this->faker->url;
         
        $this->post('/links',['url'=>$url]);
        
        $this->get('/'.Link::first()->shortenLink)->assertRedirect($url);
    }

    /**
    * @test
    */
    public function a_visits_record_when_url_is_visited_by_shorten_link()
    {
        $url = $this->faker->url;
         
        $this->post('/links',['url'=>$url]);
        
        $this->assertEquals(0,Link::first()->visits);

        $this->get('/'.Link::first()->shortenLink);
        $this->assertEquals(1,Link::first()->visits);

        $this->get('/'.Link::first()->shortenLink);
        $this->assertEquals(2,Link::first()->visits);
    }

    /** @test */
    public function url_should_not_be_invalid()
    {
        $response = $this->post(route('shorten'), ['url' => $url = '']);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'url'
        ]);

        $response = $this->post(route('shorten'), ['url' => $url = 'random email']);

        $response->assertStatus(302) ;
        $response->assertSessionHasErrors([
            'url'
        ]);
    }
}

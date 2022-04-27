<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use DatabaseMigrations;
    
    public function test_searchResultsSuccessfulGet()
    {
        $response = $this->get('/search-results');

        $response->assertStatus(200);
    }

    public function test_searchResultsSuccessfulPost()
    {
        $response = $this->followingRedirects()
            ->post('/search-results')
            ->assertStatus(200);
    }



}




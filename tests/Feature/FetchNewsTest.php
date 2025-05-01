<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_app_gets_news_from_external_api(): void
    {
        $response = $this->get('/api/get-news');

        $response->assertStatus(200);
    }
}

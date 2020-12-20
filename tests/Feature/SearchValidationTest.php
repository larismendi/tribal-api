<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetWithoutParams()
    {
        $response = $this->get('/api/search');
        $response->assertStatus(422);
    }

    /**
     * A testGetProviderItunesWithoutTermAndMediaParams feature test
     *
     * @return void
     */
    public function testGetWithoutQParam()
    {
        $response = $this->json('GET', '/api/search');
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['q']);
    }

    /**
     * A testGetProviderItunesWithErrorParam feature test
     *
     * @return void
     */
    public function testGetSearch()
    {
        $response = $this->json('GET', '/api/search', [
            'q' => 'jack+johnson'
        ]);
        $response->assertStatus(200);
    }
}

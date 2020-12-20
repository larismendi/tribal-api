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
    public function testGetProviderItunesWithoutTermAndMediaParams()
    {
        $response = $this->json('GET', '/api/search', ['provider' => 'itunes']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['term', 'media']);
    }

    /**
     * A testGetProviderItunesWithErrorParam feature test
     *
     * @return void
     */
    public function testGetProviderItunesWithErrorParam()
    {
        $response = $this->json('GET', '/api/search', [
            'provider' => 'itunes',
            'q' => 'girls'
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['term', 'media']);
    }

    /**
     * A testGetProviderItunesWithTermAndMediaParams feature test
     *
     * @return void
     */
    public function testGetProviderItunesWithTermAndMediaParams()
    {
        $response = $this->json('GET', '/api/search', [
            'provider' => 'itunes',
            'term' => 'jack+johnson',
            'media' => 'music'
        ]);
        $response->assertStatus(200);
    }

    /**
     * A testGetProviderTvmazeWithoutQParam feature test
     *
     * @return void
     */
    public function testGetProviderTvmazeWithoutQParam()
    {
        $response = $this->json('GET', '/api/search', ['provider' => 'tvmaze']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('q');
    }

    /**
     * A testGetProviderItunesWithQParam feature test
     *
     * @return void
     */
    public function testGetProviderTvmazeWithQParam()
    {
        $response = $this->json('GET', '/api/search', [
            'provider' => 'tvmaze',
            'q' => 'girls'
        ]);
        $response->assertStatus(200);
    }

    /**
     * A testGetProviderCrcindWithoutNameParam feature test
     *
     * @return void
     */
    public function testGetProviderCrcindWithoutNameParam()
    {
        $response = $this->json('GET', '/api/search', ['provider' => 'crcind']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }

    /**
     * A testGetProviderCrcindWithNameParam feature test
     *
     * @return void
     */
    public function testGetProviderCrcindWithNameParam()
    {
        $response = $this->json('GET', '/api/search', [
            'provider' => 'crcind',
            'name' => 'Adam'
        ]);
        $response->assertStatus(200);
    }
}

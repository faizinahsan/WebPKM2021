<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get_alur()
    {
        $response = $this->get('/alur');

        $response->assertStatus(200);
        
    }
    public function test_get_reviewer()
    {
        $response = $this->get('/table');

        $response->assertStatus(200);
        
    }
    public function test_get_berkas()
    {
        $response = $this->get('/berkas');

        $response->assertStatus(200);
        
    }
}

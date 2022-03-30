<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_object_post(){
        $response = $this->json('POST', 'api/object', array(
                "key" => "Phone",
                "value" => "Green"
        ))->assertJsonStructure([
            "uid",
            "vc_version_uid",
            "vc_active",
            "key",
            "value",
            "timestamp"
        ]);
    }

    public function test_api_object_get(){
        $this->json('GET', 'api/object/Car')
            ->assertJsonStructure([
                'value'
            ]);
    }

    public function test_api_get_all(){
        $this->json('GET', 'api/object/get_all_records')
            ->assertJsonStructure([[
                "key",
                "value",
                "timestamp"
            ]]);
    }
}

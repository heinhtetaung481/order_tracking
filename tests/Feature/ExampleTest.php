<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\DataStore;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
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
        $data = [
            "Car" => "Blue"
        ];
        $responseFormat = [
            "uid",
            "vc_version_uid",
            "vc_active",
            "key",
            "value",
            "timestamp"
        ];
        $response = $this->post('api/object', $data);
        $response->assertStatus(201)
            ->assertJsonStructure($responseFormat);
    }

    public function test_api_object_get(){
        $responseFormat = [
            "value"
        ];
        $data = [
            "Car" => "Blue"
        ];
        $this->post('api/object', $data);
        $response = $this->withHeaders([
            'x-api-key' => '123'
        ])->get('api/object/Car');
        $response->assertOk()
            ->assertJsonStructure($responseFormat);
    }

    public function test_get_object_by_timestamp(){
        $firstData = ["Car" => "Blue"];
        $secondData = ["Car" => "Red"];

        $this->post('api/object', $firstData);
        $firstObject = DataStore::first();

        $this->post('api/object', $secondData);

        $response = $this->withHeaders([
            'x-api-key' => '123'
        ])->get('api/object/Car?timestamp=' . $firstObject->timestamp);
        $content = $response->decodeResponseJson();
        $response->assertOk();
        $this->assertEquals($firstData['Car'], $content['value']);
    }

    public function test_api_get_all(){
        $responseFormat = [[
            "key",
            "value",
            "timestamp"
        ]];
        $data = [
            "Car" => "Blue"
        ];
        $this->post('api/object', $data);
        $this->withHeaders([
            'x-api-key' => '123'
        ])->get('api/object/get_all_records')
            ->assertOk()
            ->assertJsonStructure($responseFormat);
    }
}

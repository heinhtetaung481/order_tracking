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

    public function test_api_order_post(){
        $response = $this->json('POST', 'api/order', array(
            "aTZg88qFyXYd1e5XEQUqt1" => [
                "timestamp" => "2022-01-27 14:35:08",
                "status" => "processing"
            ]
        ))->assertJsonStructure([
            "aTZg88qFyXYd1e5XEQUqt1" => [
                'timestamp',
                'status',
                'order_code',
                'id'
                ]
            ]);
    }

    public function test_api_order_get(){
        $this->json('GET', 'api/order/aTZg88qFyXYd1e5XEQUqt1')
            ->assertJsonStructure([
                "aTZg88qFyXYd1e5XEQUqt1" => [
                    'timestamp',
                    'status',
                    'order_code',
                    'id'
                    ]
                ]);
    }

    public function test_api_order_get_with_timestamp(){
        $this->json('GET', 'api/order/get_all_records')
            ->assertJsonStructure([
                [
                    'order_code',
                    'deliveries' => [
                        [
                            'id',
                            'order_code',
                            'timestamp',
                            'status'
                        ]
                    ]
                ]
                ]);
    }
}

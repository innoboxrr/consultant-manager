<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsulteeEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultee_policies_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultee_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultee_show_auth_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_id' => $consultee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_show_guest_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_id' => $consultee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultee_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\Consultee::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultee_update_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\Consultee::factory()->make()->getAttributes(),
            'consultee_id' => $consultee->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultee/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_delete_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_id' => $consultee->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_restore_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_id' => $consultee->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_force_delete_endpoint()
    {

        $consultee = \Innoboxrr\ConsultantManager\Models\Consultee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_id' => $consultee->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultee_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultantEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultant_policies_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultant->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultant_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultant_show_auth_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_id' => $consultant->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_show_guest_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_id' => $consultant->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultant_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\Consultant::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultant_update_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\Consultant::factory()->make()->getAttributes(),
            'consultant_id' => $consultant->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultant/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_delete_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_id' => $consultant->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_restore_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_id' => $consultant->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_force_delete_endpoint()
    {

        $consultant = \Innoboxrr\ConsultantManager\Models\Consultant::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_id' => $consultant->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultant_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

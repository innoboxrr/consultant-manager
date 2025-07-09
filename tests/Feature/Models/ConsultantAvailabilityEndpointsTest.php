<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultantAvailabilityEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultant_availability_policies_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultantAvailability->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_availability_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultant_availability_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_availability_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultant_availability_show_auth_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_availability_show_guest_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-availability/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultant_availability_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-availability/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultant_availability_update_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultantAvailability::factory()->make()->getAttributes(),
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultant-availability/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_availability_delete_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-availability/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_availability_restore_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-availability/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_availability_force_delete_endpoint()
    {

        $consultantAvailability = \Innoboxrr\ConsultantManager\Models\ConsultantAvailability::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_availability_id' => $consultantAvailability->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-availability/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultant_availability_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-availability/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

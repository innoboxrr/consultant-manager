<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationServiceEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_service_policies_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_service_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_service_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_service_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_service_show_auth_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_service_show_guest_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-service/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_service_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationService::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-service/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_service_update_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationService::factory()->make()->getAttributes(),
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-service/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_service_delete_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-service/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_service_restore_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-service/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_service_force_delete_endpoint()
    {

        $consultationService = \Innoboxrr\ConsultantManager\Models\ConsultationService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_service_id' => $consultationService->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-service/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_service_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-service/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

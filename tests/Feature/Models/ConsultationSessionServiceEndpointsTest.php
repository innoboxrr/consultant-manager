<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationSessionServiceEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_session_service_policies_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationSessionService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_session_service_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_session_service_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_session_service_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_session_service_show_auth_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_session_service_show_guest_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-session-service/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_session_service_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-session-service/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_session_service_update_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationSessionService::factory()->make()->getAttributes(),
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-session-service/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_session_service_delete_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-session-service/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_session_service_restore_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-session-service/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_session_service_force_delete_endpoint()
    {

        $consultationSessionService = \Innoboxrr\ConsultantManager\Models\ConsultationSessionService::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_session_service_id' => $consultationSessionService->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-session-service/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_session_service_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-session-service/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

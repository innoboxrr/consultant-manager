<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationAdviceEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_advice_policies_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationAdvice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_advice_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_advice_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_advice_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_advice_show_auth_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_advice_show_guest_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-advice/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_advice_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-advice/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_advice_update_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationAdvice::factory()->make()->getAttributes(),
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-advice/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_advice_delete_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-advice/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_advice_restore_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-advice/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_advice_force_delete_endpoint()
    {

        $consultationAdvice = \Innoboxrr\ConsultantManager\Models\ConsultationAdvice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_advice_id' => $consultationAdvice->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-advice/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_advice_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-advice/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

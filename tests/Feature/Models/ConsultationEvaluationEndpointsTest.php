<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationEvaluationEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_evaluation_policies_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationEvaluation->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_evaluation_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_evaluation_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_evaluation_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_evaluation_show_auth_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_evaluation_show_guest_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-evaluation/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_evaluation_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-evaluation/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_evaluation_update_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::factory()->make()->getAttributes(),
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-evaluation/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_evaluation_delete_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-evaluation/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_evaluation_restore_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-evaluation/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_evaluation_force_delete_endpoint()
    {

        $consultationEvaluation = \Innoboxrr\ConsultantManager\Models\ConsultationEvaluation::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_evaluation_id' => $consultationEvaluation->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-evaluation/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_evaluation_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-evaluation/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsulteeRecordResponseEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultee_record_response_policies_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consulteeRecordResponse->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_response_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultee_record_response_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_response_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultee_record_response_show_auth_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_response_show_guest_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-response/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultee_record_response_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-response/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultee_record_response_update_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::factory()->make()->getAttributes(),
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultee-record-response/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_response_delete_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-response/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_response_restore_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-response/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_response_force_delete_endpoint()
    {

        $consulteeRecordResponse = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordResponse::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_response_id' => $consulteeRecordResponse->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-response/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultee_record_response_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-response/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

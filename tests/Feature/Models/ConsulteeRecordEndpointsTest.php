<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsulteeRecordEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultee_record_policies_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consulteeRecord->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultee_record_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultee_record_show_auth_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_show_guest_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultee_record_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultee_record_update_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsulteeRecord::factory()->make()->getAttributes(),
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultee-record/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_delete_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_restore_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_force_delete_endpoint()
    {

        $consulteeRecord = \Innoboxrr\ConsultantManager\Models\ConsulteeRecord::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_id' => $consulteeRecord->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultee_record_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

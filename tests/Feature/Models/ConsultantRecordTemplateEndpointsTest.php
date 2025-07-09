<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultantRecordTemplateEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultant_record_template_policies_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultantRecordTemplate->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_record_template_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultant_record_template_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_record_template_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultant_record_template_show_auth_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_record_template_show_guest_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-record-template/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultant_record_template_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-record-template/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultant_record_template_update_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::factory()->make()->getAttributes(),
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultant-record-template/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_record_template_delete_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-record-template/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_record_template_restore_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-record-template/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_record_template_force_delete_endpoint()
    {

        $consultantRecordTemplate = \Innoboxrr\ConsultantManager\Models\ConsultantRecordTemplate::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_record_template_id' => $consultantRecordTemplate->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-record-template/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultant_record_template_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-record-template/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

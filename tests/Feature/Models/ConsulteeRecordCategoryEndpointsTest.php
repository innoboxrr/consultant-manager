<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsulteeRecordCategoryEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultee_record_category_policies_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consulteeRecordCategory->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_category_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultee_record_category_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_category_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultee_record_category_show_auth_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_category_show_guest_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-category/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultee_record_category_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-category/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultee_record_category_update_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::factory()->make()->getAttributes(),
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultee-record-category/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_category_delete_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-category/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_category_restore_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-category/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_category_force_delete_endpoint()
    {

        $consulteeRecordCategory = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordCategory::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_category_id' => $consulteeRecordCategory->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-category/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultee_record_category_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-category/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

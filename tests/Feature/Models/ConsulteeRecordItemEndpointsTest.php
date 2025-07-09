<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsulteeRecordItemEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultee_record_item_policies_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consulteeRecordItem->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_item_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultee_record_item_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultee_record_item_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultee_record_item_show_auth_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_item_show_guest_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultee-record-item/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultee_record_item_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-item/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultee_record_item_update_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::factory()->make()->getAttributes(),
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultee-record-item/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_item_delete_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-item/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_item_restore_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-item/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultee_record_item_force_delete_endpoint()
    {

        $consulteeRecordItem = \Innoboxrr\ConsultantManager\Models\ConsulteeRecordItem::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultee_record_item_id' => $consulteeRecordItem->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultee-record-item/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultee_record_item_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultee-record-item/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

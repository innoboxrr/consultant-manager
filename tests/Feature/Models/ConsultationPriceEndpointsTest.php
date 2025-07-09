<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationPriceEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_price_policies_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationPrice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_price_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_price_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_price_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_price_show_auth_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_price_show_guest_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-price/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_price_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-price/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_price_update_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationPrice::factory()->make()->getAttributes(),
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-price/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_price_delete_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-price/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_price_restore_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-price/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_price_force_delete_endpoint()
    {

        $consultationPrice = \Innoboxrr\ConsultantManager\Models\ConsultationPrice::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_price_id' => $consultationPrice->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-price/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_price_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-price/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

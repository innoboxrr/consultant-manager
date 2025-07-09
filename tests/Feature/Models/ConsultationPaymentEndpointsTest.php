<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationPaymentEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_payment_policies_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationPayment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_payment_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_payment_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_payment_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_payment_show_auth_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_payment_show_guest_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-payment/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_payment_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-payment/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_payment_update_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationPayment::factory()->make()->getAttributes(),
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-payment/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_payment_delete_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-payment/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_payment_restore_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-payment/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_payment_force_delete_endpoint()
    {

        $consultationPayment = \Innoboxrr\ConsultantManager\Models\ConsultationPayment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_payment_id' => $consultationPayment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-payment/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_payment_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-payment/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

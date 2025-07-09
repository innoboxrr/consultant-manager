<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationAppointmentEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_appointment_policies_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationAppointment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_appointment_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_appointment_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_appointment_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_appointment_show_auth_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_show_guest_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_appointment_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_appointment_update_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationAppointment::factory()->make()->getAttributes(),
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-appointment/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_delete_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-appointment/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_restore_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_force_delete_endpoint()
    {

        $consultationAppointment = \Innoboxrr\ConsultantManager\Models\ConsultationAppointment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_id' => $consultationAppointment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-appointment/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_appointment_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

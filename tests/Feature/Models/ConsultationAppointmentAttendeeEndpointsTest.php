<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationAppointmentAttendeeEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_appointment_attendee_policies_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationAppointmentAttendee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_appointment_attendee_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_appointment_attendee_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_appointment_attendee_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_appointment_attendee_show_auth_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_attendee_show_guest_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_appointment_attendee_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_appointment_attendee_update_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::factory()->make()->getAttributes(),
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_attendee_delete_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_attendee_restore_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_appointment_attendee_force_delete_endpoint()
    {

        $consultationAppointmentAttendee = \Innoboxrr\ConsultantManager\Models\ConsultationAppointmentAttendee::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_appointment_attendee_id' => $consultationAppointmentAttendee->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_appointment_attendee_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-appointment-attendee/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationIntakeFormEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_intake_form_policies_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationIntakeForm->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_intake_form_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_intake_form_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_intake_form_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_intake_form_show_auth_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_intake_form_show_guest_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-intake-form/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_intake_form_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-intake-form/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_intake_form_update_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::factory()->make()->getAttributes(),
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-intake-form/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_intake_form_delete_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-intake-form/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_intake_form_restore_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-intake-form/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_intake_form_force_delete_endpoint()
    {

        $consultationIntakeForm = \Innoboxrr\ConsultantManager\Models\ConsultationIntakeForm::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_intake_form_id' => $consultationIntakeForm->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-intake-form/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_intake_form_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-intake-form/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationPostAttachmentEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_post_attachment_policies_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationPostAttachment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_post_attachment_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_post_attachment_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_post_attachment_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_post_attachment_show_auth_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_attachment_show_guest_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post-attachment/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_post_attachment_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post-attachment/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_post_attachment_update_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::factory()->make()->getAttributes(),
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-post-attachment/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_attachment_delete_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-post-attachment/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_attachment_restore_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post-attachment/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_attachment_force_delete_endpoint()
    {

        $consultationPostAttachment = \Innoboxrr\ConsultantManager\Models\ConsultationPostAttachment::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_attachment_id' => $consultationPostAttachment->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-post-attachment/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_post_attachment_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post-attachment/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

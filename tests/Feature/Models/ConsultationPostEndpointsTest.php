<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationPostEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_post_policies_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationPost->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_post_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_post_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_post_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_post_show_auth_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_show_guest_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-post/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_post_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationPost::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_post_update_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationPost::factory()->make()->getAttributes(),
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-post/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_delete_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-post/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_restore_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_post_force_delete_endpoint()
    {

        $consultationPost = \Innoboxrr\ConsultantManager\Models\ConsultationPost::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_post_id' => $consultationPost->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-post/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_post_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-post/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

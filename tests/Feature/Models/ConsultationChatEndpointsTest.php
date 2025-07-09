<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationChatEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_chat_policies_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationChat->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_chat_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_chat_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_chat_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_chat_show_auth_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_show_guest_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_chat_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationChat::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_chat_update_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationChat::factory()->make()->getAttributes(),
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-chat/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_delete_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-chat/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_restore_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_force_delete_endpoint()
    {

        $consultationChat = \Innoboxrr\ConsultantManager\Models\ConsultationChat::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_id' => $consultationChat->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-chat/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_chat_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

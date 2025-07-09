<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultationChatMessageEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultation_chat_message_policies_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultationChatMessage->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_chat_message_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultation_chat_message_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultation_chat_message_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultation_chat_message_show_auth_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_message_show_guest_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultation-chat-message/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultation_chat_message_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat-message/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultation_chat_message_update_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::factory()->make()->getAttributes(),
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultation-chat-message/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_message_delete_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-chat-message/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_message_restore_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat-message/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultation_chat_message_force_delete_endpoint()
    {

        $consultationChatMessage = \Innoboxrr\ConsultantManager\Models\ConsultationChatMessage::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultation_chat_message_id' => $consultationChatMessage->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultation-chat-message/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultation_chat_message_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultation-chat-message/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

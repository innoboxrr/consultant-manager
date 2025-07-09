<?php

namespace Innoboxrr\ConsultantManager\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\ConsultantManager\Tests\TestCase;

class ConsultantTeamMemberEndpointsTest extends TestCase
{

    use RefreshDatabase,
        WithFaker;

    public function test_consultant_team_member_policies_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $consultantTeamMember->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_team_member_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_consultant_team_member_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_consultant_team_member_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_consultant_team_member_show_auth_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_team_member_show_guest_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('GET', '/api/innoboxrr/consultantmanager/consultant-team-member/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_consultant_team_member_create_endpoint()
    {

        $user = \Innoboxrr\ConsultantManager\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::factory()->make()->getAttributes();

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-team-member/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_consultant_team_member_update_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::factory()->make()->getAttributes(),
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('PUT', '/api/innoboxrr/consultantmanager/consultant-team-member/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_team_member_delete_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-team-member/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_team_member_restore_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-team-member/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_consultant_team_member_force_delete_endpoint()
    {

        $consultantTeamMember = \Innoboxrr\ConsultantManager\Models\ConsultantTeamMember::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'consultant_team_member_id' => $consultantTeamMember->id
        ];

        $this->json('DELETE', '/api/innoboxrr/consultantmanager/consultant-team-member/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_consultant_team_member_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/innoboxrr/consultantmanager/consultant-team-member/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}

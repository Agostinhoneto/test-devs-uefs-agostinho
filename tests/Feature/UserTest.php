<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_create_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'teste@emddddadddddddddddddddddssssddddil.com',  //alterar sempre que rodar o Teste.
            'password' => bcrypt('pdassword123'),
        ];
        $response = $this->post(route('users.store'), $data); 
        $response->assertStatus(200);
    }

    public function test_read_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user->id));

        $response->assertStatus(200);
    }


    public function test_update_user()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Updated Name',
            'email' => 'teste12345@tesdssssstssse.com', //alterar sempre que rodar o Teste.
            'password' => bcrypt('pdassword123'),

        ];

        $response = $this->put(route('users.update', $user->id), $data);
        $response->assertStatus(200);
    }

  
    public function test_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertStatus(200);
    }
  
}

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
            'email' => 'teste@email.com',  //alterar sempre que rodar o Teste.
            'password' => bcrypt('pdassword123'),
        ];
 
        $response = $this->post(route('users.store'), $data);
    
        $response->assertStatus(200);

    }
  
}

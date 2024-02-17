<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /*
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */

    use RefreshDatabase;


    public function test_can_create_user()
    {
        $data = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ];
 
        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(201);

    }

    /*
    public function test_can_read_user()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', $user->id));

        $response->assertStatus(200)
            ->assertJson(['email' => $user->email]);
    }

    public function test_can_update_user()
    {
        $user = User::factory()->create();
        $data = ['name' => 'Updated Name'];

        $response = $this->put(route('users.update', $user->id), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
    }

    public function test_can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
    */
}

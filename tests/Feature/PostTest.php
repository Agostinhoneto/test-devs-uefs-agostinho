<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
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
    /*
    public function test_can_create_post()
    {
        $data = [
            'user_id' => 1,
            'title' => 'Teste do primeiro Post',
            'content' => 'testando o content.',
        ];
       // dd($data);
        $response = $this->post(route('posts.store'), $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', $data);
    }

    public function test_can_read_post()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('posts.show', $post->id));

        $response->assertStatus(200)
            ->assertJson(['title' => $post->title, 'content' => $post->content]);
    }

    public function test_can_update_post()
    {
        $post = Post::factory()->create();
        $data = ['title' => 'Atualizando title'];

        $response = $this->put(route('posts.update', $post->id), $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', $data);
    }

    public function test_can_delete_post()
    {
        $post = Post::factory()->create();

        $response = $this->delete(route('posts.destroy', $post->id));

        $response->assertStatus(204);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
    */
}

<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{

    public function test_create_post()
    {
        $data = [
            'user_id' => 2,
            'title' => 'Teste do primeiro Post',
            'content' => 'testando o content.',
        ];
     
        $response = $this->post(route('posts.store'), $data);        
        $response->assertStatus(200);
    }
   
    /*
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

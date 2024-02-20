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
            'title' => 'Testedddd do primeiro Post',
            'content' => 'testando o content.',
        ];
     
        $response = $this->post(route('posts.store'), $data);        
        $response->assertStatus(200);
    }
    
    public function test_read_tag()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('tags.show', $post->id));

        $response->assertStatus(200);
    }
    
    public function test_update_post()
    {
        $post = post::factory()->create();
        $data = [
            'user_id' => 1,
            'title' => 'Testedddd do atualizando primeiro Post',
            'content' => 'testando o content.',
        ];

        $response = $this->put(route('posts.update', $post->id), $data);
        $response->assertStatus(200);
    }

    public function test_delete_post()
    {
        $post = Post::factory()->create();

        $response = $this->delete(route('posts.destroy', $post->id));

        $response->assertStatus(200);
    }
}

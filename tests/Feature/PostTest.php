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
   
}

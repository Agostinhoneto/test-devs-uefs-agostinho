<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     public function test_example(): void
     {
         $response = $this->get('/');
 
         $response->assertStatus(200);
     }
     
    public function test_create_tag()
    {
        $response = Tag::factory()->create();
        $this->refreshApplication();
        $newTag = Tag::factory()->create();
        $this->assertTrue(true);
    }

    
    public function test_read_tag()
    {
        $tag = Tag::factory()->create();

        $response = $this->get(route('tags.show', $tag->id));

        $response->assertStatus(200);
    }
    
    public function test_update_tag()
    {
        $tag = Tag::factory()->create();
        $data = [
            'name' => 'Updated Name Test',
         ];

        $response = $this->put(route('tags.update', $tag->id), $data);
        $response->assertStatus(200);
    }

    public function test_delete_tag()
    {
        $tag = Tag::factory()->create();

        $response = $this->delete(route('tags.destroy', $tag->id));

        $response->assertStatus(200);
    }

}

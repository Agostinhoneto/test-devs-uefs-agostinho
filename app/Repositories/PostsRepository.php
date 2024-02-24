<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{

    private $post;

    public function getAll()
    {
        $posts = Post::with('tags')->get();
        return $posts;
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }


    public function createPost($user_id, $title, $content, $tags)
    {
        try {
            $post = new Post();
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content  = $content;
            $post->save();
            $post->tags()->sync($tags);
            return $post;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $user_id, $title, $content, $tags)
    {

        try {
            if ($id != null) {
                $post = Post::find($id);
                $post->user_id = $user_id;
                $post->title = $title;
                $post->content  = $content;
                $post->update();
                $post->tags()->sync($tags);
                return $post;
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function delete($id)
    {
        try {
            if ($id != null) {
                $post = Post::findOrFail($id);
                $post->delete();
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}

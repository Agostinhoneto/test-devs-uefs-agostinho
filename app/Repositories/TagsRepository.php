<?php

namespace App\Repositories;

use App\Models\Tag;

class TagsRepository
{
    private $tag;

    public function getAll()
    {
        return Tag::all();
    }

    public function getById($id)
    {
        return Tag::findOrFail($id);
    }
    
    public function salvar($name)
    {
        try {
            $tag = new Tag();
            $tag->name = $name;
            $tag->save();
            return $tag;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $name)
    {
        try {
            if($id != null ){
            $tag = Tag::find($id);
            $tag->id = $id;
            $tag->name = $name;
            $tag->update();
            return $tag->fresh();
            }
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function delete($id)
    {
        try {
            if($id != null ){
                $tag = Tag::findOrFail($id);
                $tag->delete();
                return $tag;
            } 
            } catch (\Exception $e) {
                throw new \Exception($e);
            }
    }
}

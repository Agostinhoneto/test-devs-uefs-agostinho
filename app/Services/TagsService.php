<?php

namespace App\Services;

use App\Repositories\tagsRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class TagsService
{
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getAll()
    {
        return $this->tagsRepository->getAll();
    }

    public function getById($id)
    {
        return $this->tagsRepository->getById($id);
    }
    
    public function createTag($name)
    {
        DB::beginTransaction();
        try {
            $data = $this->tagsRepository->salvar($name);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function updateTag($id, $name)
    {
        DB::beginTransaction();
        try {
            $data = $this->tagsRepository->update($id, $name);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            $tag = $this->tagsRepository->delete($id);
            DB::commit();

        }
        catch(Exception $e){
            DB::rollback();
            throw new \Exception($e);
        }
        return $tag;
    }
}

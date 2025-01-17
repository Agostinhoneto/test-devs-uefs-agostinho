<?php

namespace App\Http\Controllers;

use App\Helpers\HttpStatusCodes;
use App\Helpers\Messages;
use App\Http\Requests\StoreTagRequest;
use App\Services\TagsService;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagsService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {

        $limit = 10;
        try {
            $result['data'] = $this->tagService->getAll($limit);
            return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function show($id)
    {
        try {
            if (!empty($id)) {
                $result['data'] = $this->tagService->getById($id);
                return response()->json([Messages::SUCCESS_MESSAGE, HttpStatusCodes::OK, $result]);
            }
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function store(StoreTagRequest $request)
    {
        $result['data'] = $this->tagService->createTag(
            $request->name,
        );
        return response()->json([Messages::SAVE_MESSAGE, HttpStatusCodes::OK, $result]);
    }

    public function update(StoreTagRequest $request)
    {
        try {
            $result['data'] = $this->tagService->updateTag(
                $request->id,
                $request->name,
            );
            return response()->json([Messages::UPDATE_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }

    public function destroy($id)
    {
        try {
            $result['data'] = $this->tagService->destroy($id);
            return response()->json([Messages::DELETE_MESSAGE, HttpStatusCodes::OK, $result]);
        } catch (Exception $e) {
            return response()->json([Messages::ERROR_MESSAGE, HttpStatusCodes::INTERNAL_SERVER_ERROR]);
        }
    }
}

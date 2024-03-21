<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Image;
class ImageController extends Controller
{
    public function index(): JsonResponse
    {
        $images = Image::all();
        return response()->json($images); 
    }
    public function show(int $id): JsonResponse
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Image not found.'], Response::HTTP_NOT_FOUND);
        }
    
        return response()->json($image);
    }
}

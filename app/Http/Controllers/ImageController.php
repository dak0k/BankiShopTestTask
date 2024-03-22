<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function index(Request $request): View
    {
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');

        $images = $this->imageService->getSortedImages($sort, $order);

        return view('welcome', compact('images'));
    }

    public function downloadZip(int $id): BinaryFileResponse|RedirectResponse
    {
        $image = Image::find($id);
        $zip = new \ZipArchive();
        $zipFileName = $image->filename.'.zip';

        if ($zip->open(public_path($zipFileName), \ZipArchive::CREATE) === true) {
            $zip->addFile(storage_path('app/public/images/'.$image->filename), $image->filename);
            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        }

        return back()->with('error', 'Unable to create zip file.');
    }

    public function upload(ImageRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasfile('images')) {
            $this->imageService->uploadImages($validated['images']);
        }

        return back()->with('success', 'Images uploaded successfully');
    }
}

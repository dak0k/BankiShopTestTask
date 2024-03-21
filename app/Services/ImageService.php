<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Traits\Transliteratable;

class ImageService
{
    use Transliteratable;

    public function uploadImages($files): bool
    {
        foreach ($files as $file) {
            $originalName = $file->getClientOriginalName();
            $name = $this->transliterate($originalName);
            
            $nameWithExtension = $this->uniqueFilename($name, $file->getClientOriginalExtension());

            $file->storeAs('images', $nameWithExtension, 'public');

            $image = new Image();
            $image->filename = $nameWithExtension;
            $image->save();
        }

        return true;
    }

    protected function uniqueFilename($filename, $extension): string
    {
        $baseName = pathinfo($filename, PATHINFO_FILENAME);
        
        $baseName = preg_replace('/\.' . preg_quote($extension) . '$/', '', $baseName);

        $newFilename = $baseName;
        $count = 1;

        while (Storage::disk('public')->exists('images/' . $newFilename . ($count > 1 ? "-$count" : '') . '.' . $extension)) {
            $count++;
        }

        return $newFilename . ($count > 1 ? "-$count" : '') . '.' . $extension;
    }

    public function getSortedImages($sort = 'created_at', $order = 'desc')
    {
        return Image::orderBy($sort, $order)->get();
    }

}

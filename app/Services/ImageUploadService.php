<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * Upload an image to the specified path.
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string|null $oldFile
     * @return string
     */
    public function upload(UploadedFile $file, string $path, ?string $oldFile = null): string
    {
        if ($oldFile) {
            $this->delete($oldFile);
        }

        return $file->store($path, 'public');
    }

    /**
     * Delete an image from storage.
     *
     * @param string $path
     * @return void
     */
    public function delete(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}

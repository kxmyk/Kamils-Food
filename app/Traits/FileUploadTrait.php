<?php

namespace App\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = null, $path = "/uploads")
    {
        $fileSystem = new Filesystem();

        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            if ($oldPath && $fileSystem->exists(public_path($oldPath))) {
                $fileSystem->delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return NULL;
    }

    function removeImage(string $path): void
    {
        $fileSystem = new Filesystem();

        if ($fileSystem->exists(public_path($path))) {
            $fileSystem->delete(public_path($path));
        }
    }
}

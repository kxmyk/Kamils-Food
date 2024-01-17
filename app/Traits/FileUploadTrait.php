<?php

namespace App\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;
use File;

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

}

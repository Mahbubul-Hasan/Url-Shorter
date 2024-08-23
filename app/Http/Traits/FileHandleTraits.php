<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileHandleTraits
{
    public function uploadFile($requestOBJ, $file, $path)
    {
        if ($requestOBJ->hasFile($file)) {
            $file        = $requestOBJ->file($file);
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs("$path", $file, $fileNewName);
            return $fileNewName;
        }
        return null;
    }

    public function uploadFileWithPath($file, $path)
    {
        if ($this->hasFile($file)) {
            $file        = $this->file($file);
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            if (Storage::disk('public')->putFileAs("$path", $file, $fileNewName)) {
                return $path . "/" . $fileNewName;
            } else {
                return false;
            }
        }
        return null;
    }

    public function uploadFileWithPublic($file, $path)
    {

        $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

        if (Storage::disk('public')->putFileAs("$path", $file, $fileNewName)) {
            return $path . "/" . $fileNewName;
        } else {
            return false;
        }
    }

    public function updateFileWithPath($file, $oldName, $path)
    {
        if ($this->hasFile($file)) {

            $oldFilePath = Storage::disk('public')->has($oldName);
            if ($oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }

            $file        = $this->file($file);
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            if (Storage::disk('public')->putFileAs("$path", $file, $fileNewName)) {
                return $path . "/" . $fileNewName;
            } else {
                return false;
            }
        }
        return null;
    }

    public function updateFile($requestOBJ, $file, $oldName, $path)
    {
        if ($requestOBJ->hasFile($file)) {

            $oldFilePath = public_path("/storage/{$path}/{$oldName}");
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            $file        = $requestOBJ->file($file);
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs("$path", $file, $fileNewName);
            return $fileNewName;
        }
        return $oldName;
    }

    public function uploadMultipleFile($file, $path)
    {
        if ($file) {
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            if (Storage::disk('public')->putFileAs("$path", $file, $fileNewName)) {
                return $fileNewName;
            } else {
                return false;
            }
        }
        return null;
    }

    public function uploadFileWithPreObj($file, $path)
    {
        if ($file) {
            $fileNewName = time() . "-" . uniqid() . "." . $file->getClientOriginalExtension();

            if (Storage::disk('public')->putFileAs("$path", $file, $fileNewName)) {
                return $fileNewName;
            } else {
                return false;
            }
        }
        return null;
    }

    public function deleteMultipleFile($oldName, $path)
    {
        $oldFilePath = public_path("/storage/{$path}/{$oldName}");
        if (File::exists($oldFilePath)) {
            File::delete($oldFilePath);
        }
    }
}

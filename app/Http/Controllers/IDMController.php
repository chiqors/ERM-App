<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class IDMController extends Controller
{
    public function download($directoryName, $fileName)
    {
        // Now find that file and use its ID (path) to delete it
        $dir = '/'.$directoryName;
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
        // Check if there's a file, then download it!
        if (!empty($file)) {
            $rawData = Storage::cloud()->get($file['path']);
            return response($rawData, 200)
                ->header('ContentType', $file['mimetype'])
                ->header('Content-Disposition', "attachment; filename=$fileName");
        }
    }
}

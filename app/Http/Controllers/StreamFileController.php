<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class StreamFileController extends Controller
{
    public function getStream($directoryName, $fileName)
    {
        // $filePath = public_path($filename);

        // Upload using a stream...
        // Storage::cloud()->put($filename, fopen($filePath, 'r+'));

        // Now find that file and use its ID (path) to stream it
        $dir = '/'.$directoryName;
        $recursive = false; // Get subdirectories also?
        $contents = collect(Storage::cloud()->listContents($dir, $recursive));

        // Get file details...
        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($fileName, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($fileName, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!
        //return $file; // array with file info

        // Store the file locally...
        //$readStream = Storage::cloud()->getDriver()->readStream($file['path']);
        //$targetFile = storage_path("downloaded-{$filename}");
        //file_put_contents($targetFile, stream_get_contents($readStream), FILE_APPEND);

        // Stream the file to the browser...
        $readStream = Storage::cloud()->getDriver()->readStream($file['path']);

        return response()->stream(function () use ($readStream) {
            fpassthru($readStream);
        }, 200, [
            'Content-Type' => $file['mimetype'],
            //'Content-disposition' => 'attachment; filename="'.$filename.'"', // force download?
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin\Traits;

use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\File;

trait MediaUploadTrait
{
    public function HandleMedia($request,$photoFolder,$videoFolder)
    {
        // Get Uploaded Media Basic Data
        $media = $request->file('media'); // File Object
        $mimeType = $media->getMimeType(); // Image/ext or Video/ext
        $extension = $media->getClientOriginalExtension(); // Extension
        $dummyId = uniqid();
        $media_name = $dummyId.'.'.$extension; // Create New Unique Name For Media
        $size = round($media->getSize() / 1024 / 1024,2); // Size in MB
        $formattedDuration = null;
        $duration = null;
        // Now Before Continuing, Get Type Variable Value to Complete Code Logic
        if (strstr($mimeType, "image/")) {
            $type = 'image';
            $dimensions = getimagesize($media->getPathname());
            $dimensions = "$dimensions[0] x $dimensions[1]";

            $folder = $photoFolder;
            $directory = public_path($folder);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true); // Creates the directory with permission 0755 and recursively
            }

        } elseif (strstr($mimeType, "video/")) {
            $type = 'video';
            // Save File Temporarly
            $filePath = $media->storeAs('temp', $media->getClientOriginalName());

            // extract video information using the library
            $ffmpeg = FFMpeg::create();
            $video = $ffmpeg->open(storage_path('app/' . $filePath));

            // Get duration
            $duration = $video->getFormat()->get('duration'); //seconds
            $hours = floor($duration / 3600);
            $minutes = floor(($duration / 60) % 60);
            $seconds = floor($duration % 60);
            $formattedDuration = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            // Get video dimensions
            $dimensions = $video->getStreams()->videos()->first()->getDimensions();
            $width = $dimensions->getWidth();
            $height = $dimensions->getHeight();
            $dimensions = "$width x $height";
            $folder = $videoFolder;
            $directory = public_path($folder);

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true); // Creates the directory with permission 0755 and recursively
            }
            $temp_path = storage_path('app/temp/'.$media->getClientOriginalName());
            if (File::exists($temp_path)) {
                File::delete($temp_path);
            }

        } else {
            return back();
        }

        $media->move($directory.'/', $media_name);

        return [
            $type,
            $duration,
            $directory,
            $media_name,
            $dummyId,
            $extension,
            $folder,
            $size,
            $formattedDuration,
            $dimensions
        ];
    }
}

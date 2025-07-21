<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExaminerController extends Controller
{
    public function ExaminerMarkEntry()
    {
        $folderPath = public_path('image_upload/First_Part');

        $imagePaths = [];
        $imageCount = 0;

        if (File::exists($folderPath)) {
            $files = File::files($folderPath);

            $filtered = collect($files)->filter(function ($file) {
                return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
            });

            $imageCount = $filtered->count();

            // Create relative paths for each image
            $imagePaths = $filtered->map(function ($file) {
                return asset('image_upload/First_Part/' . $file->getFilename());
            })->toArray();
        }

        return view('Examiner.mark_entry', compact('imageCount', 'imagePaths'));
    }
}

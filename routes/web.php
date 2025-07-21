<?php

use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScrutinizerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', function () {
    $imageCount = 0;
    $completedPercent = 0;

    if (Auth::check()) {
        $email = Auth::user()->email;

        if ($email === 'ictcell@duet.ac.bd') {
            $folderPath = public_path('image_upload/First_Part');

            if (File::exists($folderPath)) {
                $files = File::files($folderPath);
                $imageCount = collect($files)->filter(function ($file) {
                    return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
                })->count();
            }

            $completedPercent = 10;

        } elseif ($email === 'scrutizer@duet.ac.bd') {
            /*$folderPath = public_path('image_upload/Scrutizer_Folder');*/
            $folderPath = public_path('image_upload/First_Part');

            if (File::exists($folderPath)) {
                $files = File::files($folderPath);
                $imageCount = collect($files)->filter(function ($file) {
                    return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
                })->count();
            }

            $completedPercent = 25;
        }
    }

    return view('index', [
        'imageCount' => $imageCount,
        'completedPercent' => $completedPercent,
    ]);


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/logout', 'UserDestroy')->name('user.logout');
    });

    Route::controller(ExaminerController::class)->group(function () {
        Route::get('/examiner/mark/entry', 'ExaminerMarkEntry')->name('examiner.mark.entry');
    });

    Route::controller(ScrutinizerController::class)->group(function () {
        Route::get('/scrutinizer/mark/review', 'ScrutinizerMarkReview')->name('scrutinizer.mark.review');
    });

});
require __DIR__.'/auth.php';

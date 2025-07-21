<?php

use App\Http\Controllers\ProfileController;
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
    $folderPath = 'C:\Users\User\Desktop\DUET\First_Part';

    if (!File::exists($folderPath)) {
        $imageCount = 0;
    } else {
        $files = File::files($folderPath);

        $imageCount = collect($files)->filter(function ($file) {
            return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
        })->count();
    }
    return view('index', [
        'imageCount' => $imageCount,
        'completedPercent' => 10, // or calculated value
    ]);


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

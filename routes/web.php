<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SlugsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin,web')->group(function () {
//    Custom Admin Auth
        Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
        Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    // Admin protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
//  Admin Routes
        Route::get('/admins',[AdminController::class,'indexAdmins'])->name('admin.admins.indexAdmins');
        Route::get('/admins/create',[AdminController::class,'create'])->name('admin.admins.create');
        Route::post('/admins/store',[AdminController::class,'store'])->name('admin.admins.store');
        Route::get('/admins/edit/{id}',[AdminController::class,'edit'])->name('admin.admins.edit');
        Route::post('/admins/update',[AdminController::class,'update'])->name('admin.admins.update');
        Route::post('/admins/delete',[AdminController::class,'delete'])->name('admin.admins.delete');
//  User Management Routes
        Route::get('/users',[ManageUserController::class,'index'])->name('admin.users');
        Route::post('/users/update',[ManageUserController::class,'update'])->name('admin.users.update');
        Route::post('/users/delete',[ManageUserController::class,'delete'])->name('admin.users.delete');

//  Media Routes
        Route::get('/media',[MediaController::class,'index'])->name('admin.media');
        Route::get('/media/create',[MediaController::class,'create'])->name('admin.media.create');
        Route::get('/media/show/{id}',[MediaController::class,'show'])->name('admin.media.show');
        Route::post('/media/store',[MediaController::class,'store'])->name('admin.media.store');
        Route::get('/media/edit/{id}',[MediaController::class,'edit'])->name('admin.media.edit');
        Route::post('/media/update',[MediaController::class,'update'])->name('admin.media.update');
        Route::get('/media/delete/{id}',[MediaController::class,'delete'])->name('admin.media.delete');
//  Slugs Route
        Route::get('/slugs',[SlugsController::class,'index'])->name('admin.slugs');
        Route::get('/slugs/create',[SlugsController::class,'create'])->name('admin.slugs.create');
        Route::post('/slugs/store',[SlugsController::class,'store'])->name('admin.slugs.store');
        Route::post('/slugs/delete',[SlugsController::class,'delete'])->name('admin.slugs.delete');
//  Categories Route
        Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories');
        Route::get('/categories/create',[CategoryController::class,'create'])->name('admin.categories.create');
        Route::post('/categories/store',[CategoryController::class,'store'])->name('admin.categories.store');
        Route::post('/categories/delete',[CategoryController::class,'delete'])->name('admin.categories.delete');
//  Banner Route
        Route::get('/banner',[BannerController::class,'index'])->name('admin.banner');
        Route::get('/banner/create',[BannerController::class,'create'])->name('admin.banner.create');
        Route::post('/banner/store',[BannerController::class,'store'])->name('admin.banner.store');
        Route::get('/banner/show/{id}',[BannerController::class,'show'])->name('admin.banner.show');
        Route::post('/banner/setActive',[BannerController::class,'setActive'])->name('admin.banner.setActive');
        Route::get('/banner/delete/{id}',[BannerController::class,'delete'])->name('admin.banner.delete');
    });
});

// User Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/home', function () {
    return view('misc.index');
})->name('home');

Route::get('/photos', function () {
    return view('photos.view');
})->name('photos');

Route::get('/videos', function () {
    return view('videos.view');
})->name('videos');

Route::get('/about', function () {
    return view('misc.about');
})->name('about');
Route::get('/contact', function () {
    return view('misc.contact');
})->name('contact');

Route::get('/profile/{profile}', function () {
    return view('misc.profile');
})->name('profile');

Route::get('/userprofile/{user}', function () {
    return view('userprofile.show');
})->name('userprofile.show');

Route::get('/edituserprofile/{user}/edit', function () {
    return view('userprofile.edit');
})->name('userprofile.edit');



Route::get('/userprofile/{user}/{uploads}', function () {
    return view('.userprofile.uploads.show');
})->name('userphoto.show');

Route::get('/photos/{photo}', function () {
    return view('photos.show');
})->name('photos.show');

Route::get('/videos/{videos}', function () {
    return view('videos.show');
})->name('videos.show');

// Generated Breeze Auth
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

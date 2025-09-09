<?php

use App\Http\Controllers\PublicMusicController;
use App\Http\Controllers\PublicVideoController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\projectController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
|  Public Routes (Accessible Without Login)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/home', [HomePageController::class, 'index']);

Route::view('/about', 'user.about');
Route::view('/blog', 'user.blog');
Route::get('/track', [HomePageController::class, 'trackPage'])->name('track');
Route::view('/contact', 'user.contact');

// 🔍 Ajax Search Route
Route::get('/ajax-search', [SearchController::class, 'ajaxSearch'])->name('ajax.search');

// Videos List Page
Route::get('/videos', [HomePageController::class, 'videoPage'])->name('videos');

Route::get('/music/{id}', [PublicMusicController::class, 'show'])->name('music.details');
Route::get('/video/{id}', [PublicVideoController::class, 'show'])->name('video.details');



// ✅ Universal Details Route (for related results links)
Route::get('/details/{type}/{id}', function ($type, $id) {
    if ($type === 'video') {
        return app(PublicVideoController::class)->show($id);
    } elseif ($type === 'music') {
        return app(PublicMusicController::class)->show($id);
    }
    abort(404);
})->name('details.show');

/*
|--------------------------------------------------------------------------
| 🔐 Auth Routes (Login/Register + PreventBackHistory)
|--------------------------------------------------------------------------
*/
Route::middleware('prevent-back-history')->group(function () {
    // Login/Register
    Route::view('/login', 'user.login')->name('login');
    Route::post('/login', [projectController::class, 'login'])->name('login.post');
    Route::get('/register', [projectController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [projectController::class, 'register'])->name('register.post');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| ⭐ Authenticated User Routes (Review System + PreventBackHistory)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/delete/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

/*
|--------------------------------------------------------------------------
| 🛠 Admin Routes (Only For Admin + PreventBackHistory)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin', 'prevent-back-history'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('/admin/all-users', [UserController::class, 'index'])->name('admin.allusers');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::delete('/admin/users/{id}/delete', [UserController::class, 'destroy'])->name('admin.user.delete');

    // Music
    Route::get('/admin/music/allmusic', [MusicController::class, 'allMusicView'])->name('admin.allmusic');
    Route::get('/admin/music/all', [MusicController::class, 'index'])->name('music.index');
    Route::post('/admin/music', [MusicController::class, 'store'])->name('music.store');
    Route::get('/admin/music/{id}/edit', [MusicController::class, 'edit'])->name('music.edit');
    Route::put('/admin/music/{id}', [MusicController::class, 'update'])->name('music.update');
    Route::delete('/admin/music/{id}', [MusicController::class, 'destroy'])->name('music.delete');
    Route::get('/admin/music/deleteview', [MusicController::class, 'deleteView'])->name('music.deleteview');
    Route::get('/admin/music/editview', [MusicController::class, 'editView'])->name('music.editview');

    // Videos
    Route::get('/admin/video/all', [VideoController::class, 'index'])->name('video.index');
    Route::post('/admin/video', [VideoController::class, 'store'])->name('video.store');
    Route::get('/admin/video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/admin/video/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    Route::get('/admin/video/deleteview', [VideoController::class, 'deleteView'])->name('video.deleteview');
    Route::get('/admin/video/editview', [VideoController::class, 'editView'])->name('video.editview');

    // Categories
    Route::get('/admincategory', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    // Static Admin Pages
    Route::view('/adminvideo', 'admin.video')->name('admin.video');
    Route::view('/adminmusic', 'admin.music')->name('admin.music');
    Route::view('/admindelete', 'admin.delete')->name('admin.delete');
});

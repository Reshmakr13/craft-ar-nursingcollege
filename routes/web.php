<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use Modules\Ynotz\EasyAdmin\Services\RouteHelper;
use Modules\Ynotz\AppSettings\Http\Controllers\AppSettingsController;
use App\Http\Controllers\ContactController;

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

// Route::get('/home', [PageController::class, 'home'])->name('home');
// Route::get('/about', [PageController::class, 'about'])->name('about');
// Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact',[ContactController::class,'submit'])->name('contact.submit');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    RouteHelper::getEasyRoutes(
        modelName: 'AppSetting',
        controller: AppSettingsController::class
    );

    Route::get('/roles-permissions', [RoleController::class, 'rolesPermissions'])->name('roles.permissions');
    Route::post('/roles/permission-update', [RoleController::class, 'permissionUpdate'])->name('roles.update_permissions');
});

require __DIR__.'/auth.php';

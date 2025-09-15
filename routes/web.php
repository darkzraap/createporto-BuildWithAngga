<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\ProjectOrderController;
use App\Http\Controllers\ProjectToolController;
use App\Http\Controllers\ProjectScreenshotsController;

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

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{project:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/book', [FrontController::class, 'book'])->name('front.book');

Route::post('/book/save', [FrontController::class, 'store'])->name('front.book.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tools', ToolController::class);

    Route::resource('project_tools', ProjectToolController::class);

     Route::get('/orders', [ProjectOrderController::class, 'index'])->name('orders.index');
    Route::delete('/orders/delete/{projectOrder}', [ProjectOrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('/tools/assign/{project}', [ProjectToolController::class, 'create'])->name('project.assign.tool');
    Route::post('/tools/assign/save/{project}', [ProjectToolController::class, 'store'])->name('project.assign.tool.store');
    Route::delete('/tools/assign/{project}', [ProjectToolController::class, 'destroy'])->name('project.assign.tool.destroy');

    Route::get('/screenshots/assign/{project}', [ProjectScreenshotsController::class, 'create'])->name('screenshots.assign.project');
    Route::post('/screenshots/assign/save/{project}', [ProjectScreenshotsController::class, 'store'])->name('screenshots.assign.project.store');
    Route::delete('/screenshots/assign/{projectScreenshots}', [ProjectScreenshotsController::class, 'destroy'])->name('screenshots.assign.project.destroy');

    });
});

require __DIR__.'/auth.php';

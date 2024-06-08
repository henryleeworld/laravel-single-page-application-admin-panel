<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\PluginController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\TrafficsController;
use App\Http\Controllers\ProfileController;
use App\Models\Language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/login');
Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/language/{code}', function ($code) {
        $language = Language::where('code', $code)->first();
        if ($language) {
            Session::put('locale', $code);
        }
        return redirect()->back();
    })->name('switch-language');

    Route::middleware('auth')->group(function () {
        /*
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');
        */
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::resource('user', UserController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);
            Route::resource('languages', LanguageController::class);
            Route::get('traffics', [TrafficsController::class, 'index'])->name('traffics.index');
            Route::get('traffics/logs', [TrafficsController::class, 'logs'])->name('traffics.logs');
            Route::get('error-reports', [TrafficsController::class, 'error_reports'])->name('traffics.error-reports');
            Route::get('error-reports/{report}', [TrafficsController::class, 'error_report'])->name('traffics.error-report');

            Route::prefix('settings')->name('settings.')->group(function () {
                Route::get('/', [SettingController::class, 'index'])->name('index');
                Route::put('/update', [SettingController::class, 'update'])->name('update');
            });

            Route::prefix('plugins')->name('plugins.')->group(function(){
                Route::get('/',[PluginController::class,'index'])->name('index');
                Route::get('/install',[PluginController::class,'create'])->name('create');
                Route::post('/install',[PluginController::class,'store'])->name('store');
                Route::post('/{plugin}/activate',[PluginController::class,'activate'])->name('activate');
                Route::post('/{plugin}/deactivate',[PluginController::class,'deactivate'])->name('deactivate');
                Route::post('/{plugin}/delete',[PluginController::class,'delete'])->name('delete');
            });
        });
    });

    require __DIR__.'/auth.php';
});

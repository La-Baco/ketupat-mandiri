<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\OfficialController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsTagController;
use App\Http\Controllers\Admin\PotentialController;
use App\Http\Controllers\Admin\PotentialCategoryController;
use App\Http\Controllers\Admin\PotentialTagController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\PublicPotentialController;
use App\Http\Controllers\PublicAgendaController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\PublicProfileController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', [PublicProfileController::class, 'index'])->name('profile.index');

Route::get('/berita', [PublicNewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [PublicNewsController::class, 'show'])->name('news.show');

Route::get('/potensi', [PublicPotentialController::class, 'index'])->name('potentials.index');
Route::get('/potensi/{slug}', [PublicPotentialController::class, 'show'])->name('potentials.show');

Route::get('/agenda', [PublicAgendaController::class, 'index'])->name('agendas.index');
Route::get('/agenda/{slug}', [PublicAgendaController::class, 'show'])->name('agendas.show');

Route::get('/galeri', [PublicGalleryController::class, 'index'])->name('galleries.index');
Route::get('/galeri/{slug}', [PublicGalleryController::class, 'show'])->name('galleries.show');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Core CMS
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    
    Route::get('/village-profile', [VillageProfileController::class, 'index'])->name('village-profile.index');
    Route::put('/village-profile', [VillageProfileController::class, 'update'])->name('village-profile.update');
    
    Route::resource('officials', OfficialController::class);
    Route::resource('heroes', HeroSectionController::class);
    Route::resource('announcements', AnnouncementController::class);
    
    // Content CMS
    Route::resource('news', NewsController::class);
    Route::resource('news-categories', NewsCategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('news-tags', NewsTagController::class)->except(['create', 'edit', 'show']);
    
    Route::resource('potentials', PotentialController::class);
    Route::resource('potential-categories', PotentialCategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('potential-tags', PotentialTagController::class)->except(['create', 'edit', 'show']);
    
    Route::resource('galleries', GalleryController::class);
    Route::resource('agendas', AgendaController::class);
    Route::resource('users', UserController::class)->except('show');
});

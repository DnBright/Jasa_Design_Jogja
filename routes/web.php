<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LandingSettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Models\LandingSetting;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\PricingPlan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $settings = LandingSetting::first();
    $services = Service::orderBy('order')->orderBy('id')->get();
    $portfolios = Portfolio::orderBy('order')->orderBy('id')->get();
    $pricingPlans = PricingPlan::orderBy('order')->orderBy('id')->get();

    return view('welcome', compact('settings', 'services', 'portfolios', 'pricingPlans'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Control Panel Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Settings
    Route::get('/settings', [LandingSettingsController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [LandingSettingsController::class, 'update'])->name('settings.update');

    // Services CRUD
    Route::resource('services', ServiceController::class)->except(['show']);

    // Portfolio CRUD
    Route::resource('portfolios', PortfolioController::class)->except(['show']);

    // Pricing Plans CRUD
    Route::resource('pricing-plans', PricingPlanController::class)->except(['show']);
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\FileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PlanController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Frontend\SubscribeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
  return view('admin.dashboard.index');
});

Route::namespace('Frontend')->group(function () {

  Route::get('/plans', [PlanController::class, 'index'])->name('frontend.plans.index');
  Route::get('/subscribe/{plan_id}', [SubscribeController::class, 'index'])->name('frontend.subscribe.index');
  Route::post('/subscribe/{plan_id}', [SubscribeController::class, 'register'])->name('frontend.subscribe.register');
  //files
  Route::get('file/{file_id}', [FileController::class, 'details'])->name('frontend.files.details');
  Route::get('file/download/{file_id}', [FileController::class, 'download'])->name('frontend.files.download');
});


Route::prefix('admin')->namespace('Admin')->group(function () {

  // user rout
  Route::get('/users', [UsersController::class, 'index'])->name('admin.users.list');
  Route::get('/users/create', [UsersController::class, 'create'])->name('admin.users.create');
  Route::post('/users/create', [UsersController::class, 'store'])->name('admin.users.store');
  Route::get('/users/delete/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
  Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
  Route::post('/users/edit/{id}', [UsersController::class, 'update'])->name('admin.users.update');
  Route::get('/users/packages/{id}', [UsersController::class, 'packages'])->name('admin.users.packages');

  // file rout
  Route::get('/filse', [FilesController::class, 'index'])->name('admin.files.list');
  Route::get('/filse/create', [FilesController::class, 'create'])->name('admin.files.create');
  Route::post('/filse/create', [FilesController::class, 'store'])->name('admin.files.store');
  Route::get('/filse/delete/{id}', [FilesController::class, 'destroy'])->name('admin.filse.destroy');
  Route::get('/filse/edit/{id}', [FilesController::class, 'edit'])->name('admin.files.edit');
  Route::post('/filse/edit/{id}', [FilesController::class, 'update'])->name('admin.files.update');

  // plan rout
  Route::get('/plans', [PlansController::class, 'index'])->name('admin.plans.list');
  Route::get('/plans/create', [PlansController::class, 'create'])->name('admin.plans.create');
  Route::post('/plans/create', [PlansController::class, 'store'])->name('admin.plans.store');
  Route::get('/plans/delete/{id}', [PlansController::class, 'destroy'])->name('admin.plans.destroy');
  Route::get('/plans/edit/{id}', [PlansController::class, 'edit'])->name('admin.plans.edit');
  Route::post('/plans/edit/{id}', [PlansController::class, 'update'])->name('admin.plans.update');

  // packages rout
  Route::get('/packages', [PackagesController::class, 'index'])->name('admin.packages.list');
  Route::get('/packages/create', [PackagesController::class, 'create'])->name('admin.packages.create');
  Route::post('/packages/create', [PackagesController::class, 'store'])->name('admin.packages.store');
  Route::get('/packages/delete/{package_id}', [PackagesController::class, 'destroy'])->name('admin.packages.destroy');
  Route::get('/packages/edit/{package_id}', [PackagesController::class, 'edit'])->name('admin.packages.edit');
  Route::post('/packages/edit/{package_id}', [PackagesController::class, 'update'])->name('admin.packages.update');
  Route::get('/packages/sync_files/{package_id}', [PackagesController::class, 'syncFiles'])->name('admin.packages.sync_files');
  Route::post('/packages/sync_files/{package_id}', [PackagesController::class, 'updateSyncFiles'])->name('admin.packages.sync_files');

  // packages rout
  Route::get('/payments', [PaymentsController::class, 'index'])->name('admin.payments.list');
  //  Route::get('/payments/create', [PaymentsController::class, 'create'])->name('admin.payments.create');
  //  Route::post('/payments/create', [PaymentsController::class, 'store'])->name('admin.payments.store');
  Route::get('/payments/delete/{package_id}', [PaymentsController::class, 'destroy'])->name('admin.payments.destroy');
  Route::get('/payments/edit/{package_id}', [PaymentsController::class, 'edit'])->name('admin.payments.edit');
  //  Route::post('/payments/edit/{package_id}', [PaymentsController::class, 'update'])->name('admin.payments.update');
  // Route::get('/payments/sync_files/{package_id}', [PaymentsController::class, 'syncFiles'])->name('admin.payments.sync_files');
  // Route::post('/payments/sync_files/{package_id}', [PaymentsController::class, 'updateSyncFiles'])->name('admin.payments.sync_files');

  // categori rout
  Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.list');
  Route::get('/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
  Route::post('/categories/create', [CategoriesController::class, 'store'])->name('admin.categories.store');
  Route::get('/categories/edit/{category_id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
  Route::post('/categories/edit/{category_id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
  Route::get('/categories/delete/{category_id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
});

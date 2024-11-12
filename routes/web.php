<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else  if (Auth::check() && Auth::user()->role === 'web') {
        return redirect()->route('dashboard');
    }
    return view('home');
});

Route::get('/', [ProductController::class, 'index2'])->name('products.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
// Enable email verification
Auth::routes(['verify' => true]);


Route::group(['middleware' => 'auth'], function() {
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});
/* // User dashboard route
Route::get('/user-dashboard', function () {
    return view('user.userDashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard'); // Updated route name

// Admin dashboard route
Route::get('/admin-dashboard', function () {
    return view('admin.adminDashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard'); // Updated route name */

// Central route to redirect users based on role after login or email verification
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Redirect user to the appropriate dashboard based on their role
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard'); // Updated route reference
    }

    return redirect()->route('user.dashboard'); // Updated route reference
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/profile/edit', [AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

});

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);

// Admin Registration Routes
Route::get('admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('admin/register', [AdminAuthController::class, 'register']);

//ADMIN DASHBOARD
//create product
Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
//Route::post('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::get('admin/products/index', [ProductController::class, 'index'])->name('admin.products.index');


Route::post('admin/products/create', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('admin/products/{id}', [ProductController::class, 'getProductbyId'])->name('admin.products.getProductbyId');
Route::post('admin/products/update', [ProductController::class, 'updateProduct'])->name('admin.products.updateProduct');
Route::get('admin/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.products.deleteProduct');
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::patch('/cart/{cart}/update/{quantity}', [CartController::class, 'update'])->name('cart.update');
});

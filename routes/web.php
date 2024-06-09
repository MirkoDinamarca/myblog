<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');


Route::get('/', [HomeController::class, 'getHome'])->name('/');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    # Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    # Blogs
    Route::get('category/create', [CategoryController::class, 'getCreate'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/index', [CategoryController::class, 'getIndex'])->name('category.index');

    # Usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
    Route::put('/usuarios/update', [UserController::class, 'update'])->name('usuarios.update');
});
// Ruta para mostrar la vista de edición
Route::get('category/edit/{id}', [CategoryController::class, 'getEdit'])->name('category.edit');

// Ruta para actualizar el post
Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('category/show/{id}', [CategoryController::class, 'getShow'])->name('category.show');





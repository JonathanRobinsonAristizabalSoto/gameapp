<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

// ====================
// Rutas de vistas
// ====================

// Ruta vista Welcome
Route::get('/', [GameController::class, 'welcome'])->name('welcome');

// Ruta vista Catalogue
Route::get('/catalogue', [GameController::class, 'catalogue'])->name('catalogue');

// Ruta dashboard, protegida por autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ====================
// Rutas de autenticación
// ====================
Route::middleware('web')->group(function () {
    // Registro de usuario
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Inicio de sesión
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Cierre de sesión
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// ====================
// Rutas protegidas por autenticación
// ====================
Route::middleware('auth')->group(function () {

    // ====================
    // Rutas de perfil
    // ====================
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index'); // Nueva ruta para index
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    // ====================
    // Rutas de usuarios (CRUD)
    // ====================
    Route::resource('users', UserController::class)->except(['destroy']); // Exceptuar eliminación si es necesario
    Route::post('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{user}/disable', [UserController::class, 'disable'])->name('users.disable');
    Route::post('/users/{user}/disable', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

    // Rutas de exportación
    Route::get('/users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');
    Route::get('/users/export/excel', [UserController::class, 'exportExcel'])->name('users.export.excel');

    // Rutas de importación
    Route::post('users/import/excel', [UserController::class, 'importExcel'])->name('users.import.excel');

    // ====================
    // Rutas de categorías (CRUD)
    // ====================
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::post('/search', [CategoryController::class, 'search'])->name('categories.search');
        Route::get('/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    });

    // Rutas de exportación
    Route::get('/categories/export/pdf', [CategoryController::class, 'exportPdf'])->name('categories.export.pdf');
    Route::get('/categories/export/excel', [CategoryController::class, 'exportExcel'])->name('categories.export.excel');

    // Rutas de importación
    Route::post('categories/import/excel', [CategoryController::class, 'importExcel'])->name('categories.import.excel');

    // ====================
    // Rutas de juegos (CRUD)
    // ====================
    Route::prefix('games')->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('games.index');
        Route::get('/create', [GameController::class, 'create'])->name('games.create');
        Route::post('/', [GameController::class, 'store'])->name('games.store');
        Route::get('/{game}', [GameController::class, 'show'])->name('games.show');
        Route::get('/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
        Route::put('/{game}', [GameController::class, 'update'])->name('games.update');
        Route::delete('/{game}', [GameController::class, 'destroy'])->name('games.destroy');
        Route::post('/search', [GameController::class, 'search'])->name('games.search');
        Route::get('/{game}/delete', [GameController::class, 'delete'])->name('games.delete');

        // Rutas de exportación
        Route::get('/games/export/pdf', [GameController::class, 'exportPdf'])->name('games.export.pdf');
        Route::get('/games/export/excel', [GameController::class, 'exportExcel'])->name('games.export.excel');

        // Rutas de importación
        Route::post('games/import/excel', [GameController::class, 'importExcel'])->name('games.import.excel');
    });

    // ====================
    // Ruta de la colección
    // ====================
    Route::get('/collection', [CollectionController::class, 'index'])->name('collection.index');
    Route::get('/collection/{id}', [CollectionController::class, 'show'])->name('collection.show');
    Route::get('/collection/{id}/delete', [CollectionController::class, 'delete'])->name('collection.delete');
    Route::delete('/collection/{id}', [CollectionController::class, 'destroy'])->name('collection.destroy');
});

// ====================
// Ruta del dashboard del usuario
// ====================
Route::get('/dashboard-user', [UserDashboardController::class, 'index'])->name('dashboard.user');

// ====================
// Cargar rutas de autenticación
// ====================
require __DIR__ . '/auth.php';
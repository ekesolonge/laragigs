<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listings
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create form
Route::middleware('auth')->get('/listings/create', [ListingController::class, 'create']);

// Store listing data
Route::middleware('auth')->post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::middleware('auth')->get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing
Route::middleware('auth')->put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::middleware('auth')->delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Manage listings
Route::middleware('auth')->get('/listings/manage', [ListingController::class, 'manage']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register form
Route::middleware('guest')->get('/register', [UserController::class, 'create']);

// Create new user
Route::middleware('guest')->post('/users', [UserController::class, 'store']);

// Logout user
Route::middleware('auth')->post('/logout', [UserController::class, 'logout']);

// Show login form
Route::middleware('guest')->get('/login', [UserController::class, 'login'])->name('login');

// Login user
Route::middleware('guest')->post('/users/authenticate', [UserController::class, 'authenticate']);

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShoppingListsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ShoppingListsController::class, 'index'])->name('index');
Route::get('/list/{listId}', [ShoppingListsController::class, 'show'])->name('list.show');
Route::delete('/list/{listId}', [ShoppingListsController::class, 'delete'])->name('list.delete');

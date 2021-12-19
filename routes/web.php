<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\GroupsController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('pages.admin');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [GroupsController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/createGroup', [GroupsController::class, 'create'])->middleware(['auth'])->name('group.create');
Route::post('/storeGroup', [GroupsController::class, 'store'])->middleware(['auth'])->name('group.store');
Route::get('/edit/{id}', [GroupsController::class, 'edit'])->middleware(['auth'])->name('group.edit');
Route::put('/update/{id}', [GroupsController::class, 'update'])->middleware(['auth'])->name('group.update');
Route::delete('/destory/{id}', [GroupsController::class, 'destroy'])->middleware(['auth'])->name('group.delete');

//Client
Route::get('/client', [ClientsController::class, 'index'])->middleware(['auth'])->name('client');
Route::get('/createClient', [ClientsController::class, 'create'])->middleware(['auth'])->name('client.create');
Route::post('/storeClient', [ClientsController::class, 'store'])->middleware(['auth'])->name('client.store');
Route::get('/clientEdit/{id}', [ClientsController::class, 'edit'])->middleware(['auth'])->name('client.edit');
Route::put('/clietnUpdate/{id}', [ClientsController::class, 'update'])->middleware(['auth'])->name('client.update');
Route::delete('/clientDestory/{id}', [ClientsController::class, 'destroy'])->middleware(['auth'])->name('client.delete');
Route::post('/file-import', [ClientsController::class, 'fileImport'])->middleware(['auth'])->name('file-import');

Route::get('/basic_email/{id}', [\App\Http\Controllers\EmailSendController::class, 'index'])->middleware(['auth'])->name('basic_email');
Route::get('/bulk_email/{id}', [\App\Http\Controllers\EmailSendController::class, 'bulk_email'])->middleware(['auth'])->name('bulk_email');
Route::get('/sentEmail', [\App\Http\Controllers\EmailSendController::class, 'sentEmail'])->middleware(['auth'])->name('sentEmail');


require __DIR__.'/auth.php';

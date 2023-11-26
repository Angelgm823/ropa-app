<?php

use App\Livewire\Client\ClientComponent;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\ProductShow;
use App\Livewire\User\UserComponent;
use App\Livewire\User\UserShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Inicio;
use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\CategoryShow;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', Inicio::class)->name('home')->middleware(['auth']);

Route::get('/categorias', CategoryComponent::class)->name('categorias')->middleware(['auth']);
Route::get('/categorias/{category}', CategoryShow::class)->name('categorias.show')->middleware(['auth']);

Route::get('/productos', ProductComponent::class)->name('products')->middleware(['auth']);
Route::get('/productos/{product}', ProductShow::class)->name('products.show')->middleware(['auth']);

Route::get('/ususrios', UserComponent::class)->name('users')->middleware(['auth']);
Route::get('/ususrios/{user}', UserShow::class)->name('users.show')->middleware(['auth']);

Route::get('/clientes', ClientComponent::class)->name('clients')->middleware(['auth']);

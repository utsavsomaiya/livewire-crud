<?php

use App\Http\Livewire\Channel\CreateOrUpdate;
use App\Http\Livewire\Channel\Index;
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

Route::get('/', Index::class)->name('channel.index');
Route::get('/create', CreateOrUpdate::class)->name('channel.create');
Route::get('/edit/{id}', CreateOrUpdate::class)->name('channel.edit');
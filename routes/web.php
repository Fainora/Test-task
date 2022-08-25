<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PipelineController;
use App\Http\Controllers\StatusController;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [IndexController::class, 'index']);

Route::get('/leads', [LeadController::class, 'index'])->name('lead.index');
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/pipelines', [PipelineController::class, 'index'])->name('pipeline.index');
Route::get('/statuses', [StatusController::class, 'index'])->name('status.index');
Route::get('/users', [UserController::class, 'index'])->name('user.index');

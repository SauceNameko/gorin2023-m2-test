<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/admin/login", [LoginController::class, "login"])->name("login");
Route::post("/admin/login", [LoginController::class, "check"])->name("check");
Route::get("/admin/dashboard", [AdminController::class, "index"])->name("dashboard");
Route::get("/admin/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/admin/event/index", [EventController::class, "index"])->name("event_index");
Route::get("/admin/event/create", [EventController::class, "create"])->name("event_create");
Route::post("/admin/event/store", [EventController::class, "store"])->name("event_store");
Route::get("/admin/event/edit/{id}", [EventController::class, "edit"])->name("event_edit");
Route::post("/admin/event/update/{id}", [EventController::class, "update"])->name("event_update");
Route::get("/admin/event/destroy/{id}", [EventController::class, "destroy"])->name("event_destroy");

Route::get("/admin/worker/index", [WorkerController::class, "index"])->name("worker_index");
Route::get("/admin/worker/create", [WorkerController::class, "create"])->name("worker_create");
Route::post("/admin/worker/store", [WorkerController::class, "store"])->name("worker_store");
Route::get("/admin/worker/destroy/{id}", [WorkerController::class, "destroy"])->name("worker_destroy");

Route::get("/admin/dispatch/index", [DispatchController::class, "index"])->name("dispatch_index");
Route::get("/admin/dispatch/create", [DispatchController::class, "create"])->name("dispatch_create");
Route::post("/admin/dispatch/store", [DispatchController::class, "store"])->name("dispatch_store");
Route::get("/admin/dispatch/destroy/{id}", [DispatchController::class, "destroy"])->name("dispatch_destroy");

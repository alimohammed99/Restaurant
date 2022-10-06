<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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




Route::get("/", [HomeController::class, "index"]);
                                                    // WHAT WE SEE BEFORE LOGGING IN i.e our home view 
Route::get("/redirects", [HomeController::class, "redirects"]);
                                                            // WHAT WE SEE AFTER LOGGING IN. IT WILL SHOW AN INTERFACE BASED ON THE 'REDIRECT' OF WHO IS TRYING TO LOG IN, WHETHER IT IS ADMIN OR A USER.

Route::get("/users", [AdminController::class, "user"]);                                                 

Route::get("/foodmenu", [AdminController::class, "foodmenu"]);

Route::post("/uploadfood", [AdminController::class, "uploadfood"]);

Route::get("/deleteuser/{id}", [AdminController::class, "deleteuser"]);

Route::get("/deletefood/{id}", [AdminController::class, "deletefood"]);

Route::get("/editfood/{id}", [AdminController::class, "editfood"]);

Route::post("/updatefood/{id}", [AdminController::class, "updatefood"]);

Route::post("/reservation", [AdminController::class, "reservation"]);

Route::get("/viewreservation", [AdminController::class, "viewreservation"]);

Route::get("/viewchefs", [AdminController::class, "viewchefs"]);

Route::post("/uploadchef", [AdminController::class, "uploadchef"]);

Route::get("/deletechef/{id}", [AdminController::class, "deletechef"]);

Route::get("/editchef/{id}", [AdminController::class, "editchef"]);

Route::post("/updatechef/{id}", [AdminController::class, "updatechef"]);

Route::post("/addcart/{id}", [HomeController::class, "addcart"]);

Route::get("/showcart/{id}", [HomeController::class, "showcart"]);

Route::get("/remove/{id}", [HomeController::class, "remove"]);

Route::post("/confirmorder", [HomeController::class, "confirmorder"]);

Route::get("/orders", [AdminController::class, "orders"]);

Route::get("/search", [AdminController::class, "search"]);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

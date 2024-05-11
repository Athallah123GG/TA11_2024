<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\FoodController;
use Database\Factories\AreaFactory;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



//Main Page Frontend
Route::get('/', [MainController::class ,'index'])->name('welcome');
Route::get('/daerah', [MainController::class , 'daerah'])->name('daerah');
Route::get('/profile', [MainController::class , 'profile'])->name('profile');
Route::get('/drink', [MainController::class , 'drink'])->name('drink');
Route::get('/food', [MainController::class , 'food'])->name('food');
Route::get('/welcomedrink' ,[MainController::class ,'welcomedrink'])->name('welcomedrink');
Route::get('/welcomefood' ,[MainController::class ,'welcomefood'])->name('welcomefood');

Route::get('/welcomearea' ,[MainController::class ,'welcomearea'])->name('welcomearea');

//Not Found Page
// Route::get('/notfound', [MainController::class, 'notfound'])->name('notfound');

//Login Function
Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/authenticate' , [AuthController::class , 'authenticate']) -> name('authenticate');

//Register Fnction
Route::get('/register', [AuthController::class , 'register'])->name('register');
Route::post('/storeUser' , [AuthController::class, 'storeUser'])->name('storeUser'); //Function Register

//Logout Function
Route::get('/unauthenticate' , [AuthController::class , 'unauthenticate'])->name('unauthenticate');

Route::group(['middleware' => ['auth','admin_middleware']],function(){

    Route::get('/dashboard' ,[DashboardController::class , 'dashboard'])->name('dashboard');

    //Data
    Route::get('/indexdata' ,[DataController::class , 'indexdata'])->name('indexdata');

    //Daerah BackEnd
    Route::get('/area' ,[AreaController::class , 'index'])->name('area.index');
    Route::get('/create' ,[AreaController::class, 'create'])->name('create');
    Route::get('/area/create', [DaerahController::class, 'create'])->name('area.create');
    Route::post('/area' , [AreaController::class ,'store'])->name('area.store');
    Route::get('/area/{id}/edit', [AreaController::class, 'edit'])->name('area.edit');
    Route::put('/area/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('/area/{id}', [AreaController::class, 'destroy'])->name('area.destroy');



    // Route::delete('/area/{id}' , [AreaController::class, 'destroy'])->name('area.destroy');

    // Food
    // Route::get('/create', [FoodController::class , 'create'])->name('create');
    Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
    Route::get('/food', [FoodController::class , 'index'])->name('food.index');
    Route::post('/food' , [FoodController::class ,'store'])->name('food.store');
    Route::get('/food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::put('/food/{id}', [FoodController::class, 'update'])->name('food.update');
    Route::delete('/food/{id}', [FoodController::class, 'destroy'])->name('food.destroy');


    // Drink
    Route::get('/drink' ,[DrinkController::class, 'index'])->name('drink.index');
    Route::get('/create' ,[DrinkController::class ,'create'])->name('create');
    Route::get('/drink/create' ,[DrinkController::class ,'create'])->name('drink.create');
    Route::post('/drink' ,[DrinkController::class ,'store'])->name('drink.store');
    Route::get('/drink/{id}/edit' ,[DrinkController::class ,'edit'])->name('drink.edit');
    Route::post('/drink/{id}', [DrinkController::class, 'update'])->name('drink.update');
    Route::delete('/drink/{id}', [DrinkController::class, 'destroy'])->name('drink.destroy');

    //Profile

    //User

    //Setting

    //Table

});

//Front end Detail Area , Minuman , Makanan
Route::get('/area/{id}' ,[AreaController::class , 'show'])->name('area.show');
Route::get('/food/{id}' ,[FoodController::class , 'show'])->name('food.show');
Route::get('/drink/{id}' ,[DrinkController::class , 'show'])->name('drink.show');


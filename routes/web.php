<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\TownshipController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\ClientController;

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
    return view('welcome');
});


Route::middleware(['auth'])->group(function() {

    Route::resource('offers', OfferController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('managers', ManagerController::class);
    Route::resource('licenses', LicenseController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('sessions', SessionController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('provinces', ProvinceController::class);
    Route::resource('cities', CityController::class);
    Route::resource('townships', TownshipController::class);
    Route::resource('streets', StreetController::class);

});

Auth::routes();
Route::post('user/store', [RegisterController::class, 'store'])->name('user.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Vendor;
use App\Http\Controllers\ContactFormSubmissionController;
use Spatie\Honeypot\ProtectAgainstSpam;

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

Route::get('/', function() {
    $vendors = Vendor::select('logo')->inRandomOrder()->limit(4)->get();
    return view('welcome', compact('vendors'));
});

Route::view('/info', 'info');
Route::resource('/vendors', 'VendorsController');
Route::view('/contact', 'contact');
Route::post('/contact', 'FormsController@contact')
    ->middleware('throttle:1,60')
    ->middleware(ProtectAgainstSpam::class);

Route::View('/apply', 'apply');
Route::post('/apply', 'FormsController@apply')/*->middleware('throttle:1,1440') */;

Route::resource('/recipes', 'RecipesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

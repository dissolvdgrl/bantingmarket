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
    $vendors = Vendor::select('logo')->where('status', 1)->inRandomOrder()->limit(4)->get();
    return view('welcome', compact('vendors'));
});

Route::view('/info', 'info');
Route::get('/vendors/browse', 'VendorsController@browse')->middleware('auth');
Route::resource('/vendors', 'VendorsController');
Route::view('/contact', 'contact');
Route::post('/contact', 'FormsController@contactForm')
    ->middleware(ProtectAgainstSpam::class);

Route::View('/apply', 'apply');
Route::post('/apply', 'FormsController@apply')/* ->middleware('throttle:1,1440') */;

Route::get('/recipes/browse', 'RecipesController@browse')->middleware('auth');
Route::resource('/recipes', 'RecipesController');

Route::post('login', 'LoginController@login')->middleware('throttle:3,1400');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

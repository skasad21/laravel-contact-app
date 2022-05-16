<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

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
//     return view('welcome');
// });
Route::get('/',[ContactController::class,'index'])->name('contacts.index');
// Route::get('/contacts',function(){
//     return view('contacts.index');
// })->name('contacts.index');

// Route::get('/contacts/create',function(){
//     return view('contacts.create');
// })->name('contacts.create');

// Route::get('/contacts/{id}',function($id){
//     $contact =  App\Models\Contact::find($id);
//     return view('contacts.show',compact('contact')); // ['contact' => $contact]
// })->name('contacts.show');

// using controller

//Show Contact
Route::get('/contacts',[ContactController::class,'index'])->name('contacts.index');

//Save Sontact
Route::post('/contacts',[ContactController::class,'store'])->name('contacts.store');


Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');

Route::get('/contacts/{id}',[ContactController::class,'show'])->name('contacts.show');

//Update Contact
Route::get('/contacts/{id}/edit',[ContactController::class,'edit'])->name('contacts.edit');

Route::put('/contacts/{id}',[ContactController::class,'update'])->name('contacts.update');

Route::delete('/contacts/{id}',[ContactController::class,'destroy'])->name('contacts.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

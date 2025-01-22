<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('test', [PrimerControlador::class,'index']);
Route::get('otro/{post}', [PrimerControlador::class, 'otro']);

// Route::get('/crudos', function () {
//     $age = 33;
//     $data = ['name' => 'Adrián', 'age' => $age];
//     return view('crud/index', $data);
// })->name('crud');

// Route::get('/contact', function () {
//     $data = ['contact' => 'Adrian', 'numero' => '9937209240'];
//     // return redirect()-> route('contact2'); 
//     // return to_route('contact2');
//     return view('contact', $data);
// })->name('contact');

// Route::get('/contact2', function () {
//     return view('contact2');
// })->name('contact2');

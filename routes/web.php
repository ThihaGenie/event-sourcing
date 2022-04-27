<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', function() {
    User::createWithAttributes([
        'name' => 'Thiha',
        'email' => 'thiha@gmail.com',
        'password' => Hash::make("password"),
        'address'   => 'Asoke',
        'phone' => '06777777'
    ]);
    User::createWithAttributes([
        'name' => 'Htet',
        'email' => 'htet@gmail.com',
        'password' => Hash::make("password"),
        'address'   => 'Asoke',
        'phone' => '06777778'
    ]);
    User::createWithAttributes([
        'name' => 'Shoon',
        'email' => 'shoon@gmail.com',
        'password' => Hash::make("password"),
        'address'   => 'Asoke',
        'phone' => '06777779'
    ]);    
    return User::all(); 
});

Route::get('delete-user/{uuid}', function($uuid) {
    $user = User::uuid($uuid);
    $user->remove();
    return "User is already removed!";
});

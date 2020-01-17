<?php

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

use App\Image;
use App\User;

Route::get('/', function () {

    $users = User::all();

    foreach ($users as $user) {
        echo $user->name . "<br/>";
        var_dump($user->user_profile);
    }

//    $images = Image::all();
//
//    foreach ($images as $image) {
//        echo $image->image_path . "<br/>";
//        echo $image->description . "<br/>";
//        var_dump($image->company);
//        echo "<hr/>";
//    }

    die();
    return view('welcome');
});

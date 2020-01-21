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
use App\Company;

Route::get('/', function () {

    $users = User::all();
    $images = Image::all();
    $companys = Company::all();

    foreach ($companys as $company)
    {
        echo '<pre>';
        var_dump($company->company_profile->title );
        echo '</pre>';
    }

//    foreach ($images as $image) {
//        echo $image->image_path . "<br/>";
//        echo $image->description . "<br/>";
//        echo $image->user->name . '' . $image->user->surname . "<br/>";

//        if (count($image->comments) >= 1) {
//            echo '<h4>Comentarios: </h4>';
//            foreach ($image->comments as $comment) {
//
//                // Los ?? '' son importantes, no sé por qué no quiere tomar la propiedad name del user
//                // esta es la única forma que encontré de solucionarlo sin complecarme la vida.
//                echo $comment->user->name ?? ' ';
//                echo $comment->company->name ?? ' ';
////                foreach ($comment->user as $user)
////                {
////                    echo $user->name;
////                }
//                echo $comment->content . "<br/>";
//            }
//        }
//
//        echo 'LIKES: ' . count($image->likes);
//        echo '<hr/>';
//    }


//    foreach ($images as $image) {
//        var_dump($image->comments) . "<br/>";
//
//        foreach ($image->comments as $comment) {
//            echo $comment->user->name . '' . $comment->user->surname . "<br/>";
//            echo $comment->content;
//        }
//    }
//
//    foreach ($users as $user) {
//        echo "<pre>";
//        echo $user->name . "<br/>";
//        echo $user->user_profile . "<br/>";
//        echo $user->images . "<br/>";
//
//        echo "</pre>";
//    }

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

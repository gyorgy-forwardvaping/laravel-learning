<?php

use App\Post;
use App\User;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
// Route::get('/post', [PostController::class, 'index']);
// Route::get('/post/{id}', [PostController::class, 'index']);
// Route::get('/contact', [PostController::class, 'contact']);
//all crud
// Route::resource('/post', 'PostController');

// Route::get('/insert', function () {
//     DB::insert('INSERT INTO tbl_posts (post_title, post_body, post_is_admin) VALUES (?,?,?)', ['PHP with Laravel 2', 'PHP Laravel best thing has happened with php 2', 0]);
// });

// Route::get('/read', function () {
//     $result = DB::select('SELECT * FROM tbl_posts where post_id = ?', [1]);
//     $output = '';

//     return print_r($result);
// });

// Route::get('/update', function () {
//     $updated = DB::update('UPDATE tbl_posts SET post_title = "updated title" WHERE post_id = ?', [1]);
//     return $updated;
// });

// Route::get('/delete', function () {
//     $deleted = DB::delete('DELETE FROM tbl_posts WHERE post_id = ?', [1]);
//     return $deleted;
// });


//orm

// Route::get('/read', function () {
//     $posts = Post::all();

//     return $posts;
// });


// Route::get('/find', function () {
//     $post = Post::find(2);
//     return $post;
// });


// Route::get('/findwhere', function () {
//     $post = Post::where('post_is_admin', 0)->orderBy('post_title', 'DESC')->get();
//     return $post;
// });

// Route::get('/findmore', function () {
//     $post = Post::findOrFail(2);
//     return $post;
// });

// Route::get('/basicinsert', function () {
//     $post = new Post;
//     $post->post_title = 'new ORM Title 5';
//     $post->post_body = 'New Eloquent format 5';
//     $post->post_is_admin = 1;
//     $post->save();
// });

// Route::get('/basicupdate', function () {
//     $post = Post::find(2);
//     $post->post_title = 'new eloquent title update 2';
//     $post->post_body = 'new eloquent body update 2';

//     $post->save();
// });

// Route::get('/createolm', function () {
//     Post::create(
//         [
//             'post_title' => 'The create method',
//             'post_body' => 'Wow i learning a lot',
//             'post_user_id' => 1
//         ]
//     );
// });

// Route::get('/updateolm', function () {
//     Post::where('post_id', 3)->where('post_is_admin', 0)->update(['post_title' => 'new PHP title new', 'post_body' => 'update with Model']);
// });

// Route::get('/deletemodel', function () {
//     $post = Post::find(4);
//     $post->delete();
// });

// Route::get('/deletemodel2', function () {
//     Post::destroy([2, 5]);
// });

// Route::get('/softdelete', function () {
//     Post::find(7)->delete();
//     Post::find(6)->delete();
// });

// Route::get('/getdeleted', function () {
//     $post = Post::onlyTrashed()->get();
//     return $post;
// });

// Route::get('/restoreDeleted', function () {
//     Post::onlyTrashed()->restore();
// });

// Route::get('/deletepermanently', function () {
//     Post::onlyTrashed()->forceDelete();
// });


// 1 to 1 relationship

Route::get('/user/{user_id}/post', function ($user_id) {
    return User::find($user_id)->post->post_title;
});



Route::get('/post/{post_id}/user', function ($post_id) {
    return Post::find($post_id)->user->user_name;
});

//1 to n relationship
Route::get('/posts/{user_id}', function ($user_id) {
    $user = User::find($user_id);

    $title = [];
    echo '<pre>';
    foreach ($user->posts as $post) {
        print_r($post);
    }
    echo '</pre>';
});

Route::get('user/{user_id}/role', function ($user_id) {
    $user = User::find($user_id)->roles()->orderBy('id', 'desc')->get();
    return $user;
});

//intermediate table pivot

Route::get('/user/{user_id}/pivot', function ($user_id) {
    $user = User::find($user_id);
    foreach ($user->roles as $role) {
        echo $role->pivot->created_at;
    }
});
Route::get('user/{country_id}/country', function ($country_id) {
    $country = Country::find($country_id);
    foreach ($country->posts as $post) {
        echo $post->post_title . ', ';
    }
});

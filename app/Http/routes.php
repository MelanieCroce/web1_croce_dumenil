<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {
    /**
    Route::get('/contact', function() {
        return 'page contact';
    });
    Route::get('/articles', function(){
        return 'Mes articles:';
    });
    Route::get('/articles/create', function() {
        return view('articles.create');
    });
    Route::delete('/articles/{id}', function($id){
       //Code pour supprimer un article
    });
    Route::post('/articles', function(Request $request) {
        dd($request->all());
    });
    Route::get('/articles/{id}', function($id){
        return 'Article n°'.$id;
    });
     */
    Route::resource('/articles', 'PostController');
    Route::get('/contact', ['as' => 'page.contact', 'uses' => function() {
        return 'ok';
    }]);
    Route::auth();
    Route::get('/', function () {
        return view('welcome', ['id' => 100]);
    });
    Route::get('/home', 'HomeController@index');
});
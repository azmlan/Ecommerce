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

Route::get('/', function () {

    return view('welcome');
});






Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::group(['prefix' => 'offers'], function () {
            Route::get('/', 'CrudController@user');
            Route::get('all', 'CrudController@getAll');
            Route::get('show', 'CrudController@show');
            Route::get('create', 'CrudController@create');
            Route::post('store', 'CrudController@store')->name('anyName.here');
            Route::get('edit', 'CrudController@edit');
            Route::get('delete', 'CrudController@delete');
            Route::get('update', 'CrudController@update');
        });




        //
    }
);


// Must Login first in different ways
// Must Login first in different ways
// Must Login first in different ways
Route::get('/landing', function () {
    return view('landing');
})->middleware('verified');


Route::get('login', function () {
    return 'Must login first';
})->name('login');



Route::group(['prefix' => 'users', 'namespace' => 'Front'], function () {
    Route::get('/', 'UserController@user');

    Route::get('index', 'UserController@index');
    Route::get('show', 'UserController@show');
    Route::get('edit', 'UserController@edit');
    Route::get('delete', 'UserController@delete');
    Route::get('update', 'UserController@update');
    Route::get('check', function () {
        return 'Just Checking';
    });
});


Route::get('second', function () {
    return 'Middleware Testing and redirected';
})->middleware('auth');



Auth::routes([
    'verify' => true
]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/////////////////
/////////////////
/////////////////


Route::get('/aziz/{id?}', function ($id) {
    return ['this is route with', $id];
});



// Route::prefix('admin')->namespace('Front')->group(function(){
//     Route::get('user','UserController@index');
//     Route::get('users','UserController@showUserName');
// });


// Route::resource('res', 'NewsController');


Route::get('redirect/{service}', 'SocialController@redirect');
Route::get('callback/{service}', 'SocialController@callback');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::resource('categories', 'CategoryController');
Route::resource('customers', 'CustomerController');
Route::resource('employees', 'EmployeeController');
Route::resource('offices', 'OfficeController');
Route::resource('orders', 'OrderController');
Route::resource('order_details', 'OrderDetailController');
Route::resource('payments', 'PaymentController');
Route::resource('products', 'ProductController');

/* auth routes, move this to a controller */
Route::post('auth/new', array(
   'as' => 'auth_new',
    function() {
        $input = Input::all();
        $email = $input['email'];
        $password = Hash::make($input['password']);

        $user = User::create(array('name' => $input['name'], 'email' => $email, 'password' => $password));
        //$user = User::where('email', '=', $email);

        Auth::login($user);
        return View::make('auth/dashboard')->with('user', $user);
    }
));

Route::post('auth/login', array(
    'as' => 'auth_login',
    function() {
        $input = Input::all();
        $email = $input['email'];

        if(Auth::attempt(array('email' => $email, 'password' => $input['password']))) {
            return View::make('auth/dashboard')->with('user', Auth::user());
        }
        else {
            return Redirect::to('/');
        }
    }
));

Route::get('auth/logout', array(
    'as' => 'auth_logout',
    function() {
        Auth::logout();

        return Redirect::to('/');
    }
));

Route::get('auth/dashboard', array(
    'as' => 'auth_dashboard',
    function() {
        return View::make('auth/dashboard')->with('user', Auth::user());
    }
));

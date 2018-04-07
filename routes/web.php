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
    return view('user.welcome');
});

Route::get('/home', function () {
    return view('user.welcome');
});

Route::get('/login', function(){
	return view('user.login');
});

Route::get('/register', function(){
	return view('user.register');
});

Route::get('/search', function(){
	return view('user.search');
});

Route::get('/job', function(){
	return view('user.job');
});
Route::get('/create_job', function(){
	return view('user.create_job');
});

Route::get('/create_job', function(){
	return view('user.create_job');
});

Route::get('/test', function(){
	$a = App\User::where('first_name','farha')->limit(10)->offset(39)->get();

	// $a = App\User::offset(39)->limit(10)->where('first_name','farha')->get();
	return $a;
});

//find(1)
//find([1,2,3])
//where()
//orWhere()
//get()
//first()
//limit()  take()
//offset() skip()
//all()
//select('first_name','last_name')
//update()
//create()

//App\User::create($_POST);

/*
$a = new App\User;
$a->first_name = $_POST['first_name'];
$a->last_name  = $_POST['last_name'];

$a->save();
*/

// Auth::check()
// Auth::guest()
// Auth::user()
// Auth::id()
// Auth::login($user)
// Auth::logout()


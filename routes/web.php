<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function (Request $p) {

//     return view('welcome');
// });


Route::post('/{v1}/{obj}/{api}', function (Request $r, $v1, $obj, $api) {

	if(empty($api) || empty($obj))
		echo "error";

	$path = "App\\REST\\".ucfirst($obj)."\\".ucfirst($api);
	
	if(!class_exists($path))
		echo "error";

	$obj = new $path;
	$resp = $obj->index();
	return $resp;
	
});
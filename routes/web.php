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
    //return view('adminlte::auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/flexline', 'FlexlineController@index');

//Route::get('/listarVentas', 'VentasController@index');

Route::get('/facturaVentaFE', 'FacturaVentaFEController@index');

Route::get('/facturaVentaFE/{id}/{inicio?}/{fin?}', 'FacturaVentaFEController@show')->where([
	'id' => '[0-9]+',
	//'mes' => '[0-9]+'
]);

Route::get('/notaCrdtoVentaFE/{id}/{inicio?}/{fin?}', 'NotaCrdtoVentaFEController@show')->where([
	'id' => '[0-9]+',
	//'mes' => '[0-9]+'
]);

Route::get('/despachoVentaFE', 'DespachoVentaFEController@index');

Route::get('/listarVentas', 'VentasController@index');
Route::get('/listarVentas/{id}/{mes?}/{inicio?}/{fin?}', 'VentasController@show')->where([
	'id' => '[0-9]+',
	'mes' => '[0-9]+'
]);


// Producto
Route::get('producto', 'ProductoController@index'); // Display a listing of the resource.

Route::get('producto/{producto_id?}', 'ProductoController@show'); //Display the specified resource.

Route::post('producto', 'ProductoController@store'); //Store a newly created resource in storage.

Route::put('producto/{producto_id?}', 'ProductoController@update'); //Update the specified resource in storage.

Route::delete('producto/{producto_id?}', 'ProductoController@destroy'); //Remove the specified resource from storage.

// Empresas
Route::get('/listarEmpresas', 'EmpresasController@index'); // Display a listing of the resource.

// Ciclos
Route::get('/listarCiclos', 'CicloController@index'); // Display a listing of the resource.

// Dashboard
Route::get('/dashboard/{id}/{ciclo}', 'DashboardController@show'); // Display a listing of the resource.

// Graficos Barra
Route::get('/verGraficoBarra/{id}/{vendedor}', 'GraficoBarraController@show'); // Display a listing of the resource.

// Calendario
Route::get('datepicker', function () {
	return view('datepicker');
});

// Calendario - Rango
Route::get('daterangepicker', function () {
	return view('daterangepicker');
});

Route::get('/Sbif', 'SbifController@index');
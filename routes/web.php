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
    return view('auth/login');
});
Route::resource('almacen/categoria', 'CategoriaController');
Route::resource('almacen/articulo', 'ArticuloController');
Route::resource('ventas/cliente', 'ClienteController');
Route::resource('compras/proveedor', 'ProveedorController');
Route::resource('compras/ingreso', 'IngresoController');
Route::resource('ventas/venta', 'VentaController');
Route::resource('seguridad/usuario', 'UsuarioController');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/menu', 'HomeController@dashboard')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/pdf', 'PdfController@gen')->name('pdf');
Route::get('/pdfcat', 'PdfController@cat')->name('pdfcat');
Route::get('/pdfing', 'PdfController@ing')->name('pdfing');
Route::get('/pdfpro', 'PdfController@pro')->name('pdfpro');
Route::get('/pdfcli', 'PdfController@cli')->name('pdfcli');
Route::get('/pdfven', 'PdfController@ven')->name('pdfven');
Route::get('/pdfusu', 'PdfController@usu')->name('pdfusu');
Route::get('/{slug?}', 'HomeController@index')->name('home');

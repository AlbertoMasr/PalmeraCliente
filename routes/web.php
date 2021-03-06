<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'PedidoController@iniciaPedido')->name('home');
Route::get('/carrito', 'PedidoController@confirmarPedido')->name('carrito');
Route::get('/home/{datil}', 'PedidoController@seleccionarProducto')->name('home.datil');
Route::post('/home', 'PedidoController@agregarProducto')->name('home.agregarDatil');
Route::get('/carrito/{idCliente}/{idDatil}', 'PedidoController@eliminarProductoCarrito')->name('carrito.eliminarProducto');
Route::post('/carrito', 'PedidoController@actualizarProductoCarrito')->name('carrito.actualizarProducto');
Route::get('/pago/{total}', 'PedidoController@solicitarTarjeta')->name('compra.solicitarTarjeta');
Route::post('/pago', 'PedidoController@validarPago')->name('compra.validarPago');
Route::post('/home/datiles', 'PedidoController@buscarDatiles')->name('home.buscarDatiles');
<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Auth;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


//Active reference para el visualizar producto
Breadcrumbs::for('home.datil', function ($trail, $datil) {
    $trail->parent('home');
    $trail->push($datil->objetoVariedad->getVarNombre(), route('home.datil', ['datil' => $datil->getID()]));
});

//Active reference para el carrito
Breadcrumbs::for('carrito', function ($trail) {
    $trail->parent('home');
    $trail->push('Carrito', route('carrito' ));
});

//Active reference para el visualizar producto desde el carrito
Breadcrumbs::for('home.carrito.datil', function ($trail, $datil) {
    $trail->parent('carrito');
    $trail->push($datil->objetoVariedad->getVarNombre(), route('home.datil', ['datil' => $datil->getID()]));
});

//Active reference para pagar
Breadcrumbs::for('compra.solicitarTarjeta', function ($trail, $total) {
    $trail->parent('carrito');
    $trail->push('Pagar', route('compra.solicitarTarjeta', ['total' => $total]));
});
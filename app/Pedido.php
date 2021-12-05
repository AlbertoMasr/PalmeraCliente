<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    public $carritoDeCompra;

    public function __construct()
    {

        $this->carritoDeCompra = new CarritoDeCompra();

    }


}
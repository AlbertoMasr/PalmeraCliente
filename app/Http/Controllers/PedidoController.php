<?php

namespace App\Http\Controllers;

use App\Datil;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    private $pedido;
    private $datil;
    
    public function iniciaPedido()
    {

       $this->pedido = new Pedido();
       
       $datil = new Datil();

       $datiles = $this->datil->getDatiles();

       return view('home');

    }

}

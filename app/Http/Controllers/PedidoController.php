<?php

namespace App\Http\Controllers;

use App\Datil;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    private $pedido;
    private $datil;

    public function __construct()
    {

        $this->pedido = new Pedido();
        $this->datil  = new Datil();

    }
    
    public function iniciaPedido()
    {

        $datiles = $this->datil->getDatiles();

        return view('home', compact('datiles'));

    }

    public function seleccionarProducto(Datil $datil)
    {

            return view('datil', compact('datil'));

    }

    public function agregarProducto(Request $request)
    {

        $data = request()->validate([
            'cantidad' => 'required|numeric',
            'idDatil' => 'required|numeric'
        ]);

        if(!Auth::check())
        {

            $logearse = 'Favor de logearse para agregar producto';

            return redirect()->route('login')
            ->with('mensaje', $logearse);

        }

        $respuesta = json_decode($this->pedido->agregarProducto( $data["idDatil"], $data["cantidad"], Auth::user()->Cliente->getID()));

        return redirect()->action("PedidoController@iniciaPedido")->with($respuesta->tipo, $respuesta->mensaje);

    }

    public function confirmarPedido()
    {

        $productoCarrito = $this->pedido->getArticulos(Auth::user()->Cliente->getID());

        $total = $this->pedido->getTotal($productoCarrito);

        return view('carrito')->with('productoCarrito',$productoCarrito)->with('total', $total);

    }

    public function eliminarProductoCarrito($idCliente, $idDatil){
                


        $respuesta = json_decode($this->pedido->eliminarProductoCarrito($idCliente, $idDatil));

        return redirect()->action("PedidoController@confirmarPedido")->with($respuesta->tipo, $respuesta->mensaje);

    }

    public function actualizarProductoCarrito(Request $request){

        $data = request()->validate([
            'cantidad' => 'required|numeric',
            'idCliente' => 'required|numeric',
            'idDatil' => 'required|numeric'
        ]);

        $respuesta = json_decode($this->pedido->actualizarProductoCarrito($data["idCliente"], $data["idDatil"], $data["cantidad"]));

        return redirect()->action("PedidoController@confirmarPedido")->with($respuesta->tipo, $respuesta->mensaje);

    }    

    public function solicitarTarjeta($total){
    
        return view('pago')->with('total', $total);

    }

    public function validarPago(Request $request){

        $data = request()->validate([
            'Nombre' => 'required',
            'NoTarjeta' => 'required|numeric',
            'FechaVencimiento' => 'required|numeric',
            'CVV' => 'required|numeric',
            'Total' => 'required'
        ]);

        $respuesta = $this->pedido->realizarPago($data["NoTarjeta"], $data["FechaVencimiento"], $data["CVV"], $data["Total"]);

        if(!$respuesta)
            return redirect()->action("PedidoController@confirmarPedido")->with($respuesta->tipo, $respuesta->mensaje);

        $this->pedido->setCliente(Auth::user()->Cliente->getID());

        $esCompletado = $this->pedido->esCompletado();

    }        

}
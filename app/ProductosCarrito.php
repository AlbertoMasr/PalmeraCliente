<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductosCarrito extends Model
{

    protected $table = "productoscarrito";
    protected $primaryKey = ['idCliente', 'idDatil'];
    protected $fillable = ['cantidad'];
    public $timestamps = false;
    public $incrementing = false;

    private $idDatiles;
    private $cantidades;
    private $idClientes;
    public $productosCarritoDAO;

    public function __construct()
    {

        $this->productosCarritoDAO = new productosCarritoDAO();
        
    }

    public function getIdDatiles()
    {
        return $this->idDatil;
    }

    public function setIdDatiles($idDatiles)
    {
        $this->idDatil = $idDatiles;

        return $this;
    }

    public function getCantidades()
    {
        return $this->cantidad;
    }

    public function setCantidades($cantidades)
    {
        $this->cantidad = $cantidades;

        return $this;
    }

    public function getIdClientes()
    {
        return $this->idCliente;
    }

    public function setIdClientes($idClientes)
    {
        $this->idCliente = $idClientes;

        return $this;
    }

    public function añadir(){
        
        return $this->productosCarritoDAO->añadir($this);

    }

    public function getArticulos($idCliente){
        
        return $this->productosCarritoDAO->getArticulos($idCliente);

    }

    public function getSubTotal($productosCarrito){

        $subtotal = 0;

        foreach ($productosCarrito as $productoCarrito) {
            $subtotal += ($productoCarrito->objetoDatil->getPrecio() * $productoCarrito->getCantidades() );
        }

        return $subtotal;

    }

    public function eliminarProductoCarrito($idCliente, $iDatil){

        return $this->productosCarritoDAO->eliminarProductoCarrito($idCliente, $iDatil);

    }

    public function actualizarProductoCarrito(){

        return $this->productosCarritoDAO->actualizarProductoCarrito($this);

    }


    /* Relacion entre clases */
    public function objetoDatil()
    {

        return $this->belongsTo(Datil::class, 'idDatil');

    }

}

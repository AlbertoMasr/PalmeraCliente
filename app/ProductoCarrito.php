<?php

namespace App;

use App\DataBase\ProductoCarritoDAO;
use Illuminate\Database\Eloquent\Model;

class ProductoCarrito extends Model
{

    protected $table = "productoscarrito";
    protected $primaryKey = ['idCliente', 'idDatil'];
    protected $fillable = ['cantidad'];
    public $timestamps = false;
    public $incrementing = false;

    private $idDatiles;
    private $cantidades;
    private $idClientes;
    public $productoCarritoDAO;

    public function __construct()
    {

        $this->productoCarritoDAO = new productoCarritoDAO();
        
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
        
        return $this->productoCarritoDAO->añadir($this);

    }

    public function getArticulos($idCliente){
        
        return $this->productoCarritoDAO->getArticulos($idCliente);

    }

    public function getSubTotal($productoCarrito){


        return $productoCarrito->objetoDatil->getPrecio();

    }

    public function eliminarProductoCarrito($idCliente, $iDatil){

        return $this->productoCarritoDAO->eliminarProductoCarrito($idCliente, $iDatil);

    }

    public function actualizarProductoCarrito(){

        return $this->productoCarritoDAO->actualizarProductoCarrito($this);

    }


    /* Relacion entre clases */
    public function objetoDatil()
    {

        return $this->belongsTo(Datil::class, 'idDatil');

    }

}

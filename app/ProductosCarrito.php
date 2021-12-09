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

    public function objetoDatil()
    {

        return $this->belongsTo(Datil::class, 'idDatil');

    }

}

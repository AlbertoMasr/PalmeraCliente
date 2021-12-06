<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CarritoDeCompra extends Model
{

    protected $table = "CarritoDeCompras";
    protected $primaryKey = ['idCliente', 'idDatil'];
    protected $fillable = ['cantidad'];
    public $timestamps = false;

    private $idDatiles;
    private $cantidades;
    private $idClientes;
    
    public function __construct($datil, $cantidades, $idClientes)
    {

        $this->idDatiles   = $datil;
        $this->cantidades  = $cantidades;
        $this->idClientes = $idClientes;
        
    }


    /**
     * Get the value of idDatiles
     */ 
    public function getIdDatiles()
    {
        return $this->idDatiles;
    }

    /**
     * Set the value of idDatiles
     *
     * @return  self
     */ 
    public function setIdDatiles($idDatiles)
    {
        $this->idDatiles = $idDatiles;

        return $this;
    }

    /**
     * Get the value of cantidades
     */ 
    public function getCantidades()
    {
        return $this->cantidades;
    }

    /**
     * Set the value of cantidades
     *
     * @return  self
     */ 
    public function setCantidades($cantidades)
    {
        $this->cantidades = $cantidades;

        return $this;
    }

    /**
     * Get the value of idClientes
     */ 
    public function getIdClientes()
    {
        return $this->idClientes;
    }

    /**
     * Set the value of idClientes
     *
     * @return  self
     */ 
    public function setIdClientes($idClientes)
    {
        $this->idClientes = $idClientes;

        return $this;
    }
}

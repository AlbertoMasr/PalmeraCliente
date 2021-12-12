<?php

namespace App;

class Pago
{

    private $NoTarjeta;
    private $FechaVencimiento;
    private $CVV;
    private $Total;

    public function __construct($NoTarjeta, $FechaVencimiento, $CVV, $Total)
    {

        $this->NoTarjeta        = $NoTarjeta;
        $this->FechaVencimiento = $FechaVencimiento;
        $this->CVV              = $CVV;
        $this->Total            = $Total;
        
    }


    /**
     * Get the value of NoTarjeta
     */ 
    public function getNoTarjeta()
    {
        return $this->NoTarjeta;
    }

    /**
     * Set the value of NoTarjeta
     *
     * @return  self
     */ 
    public function setNoTarjeta($NoTarjeta)
    {
        $this->NoTarjeta = $NoTarjeta;

        return $this;
    }

    /**
     * Get the value of FechaVencimiento
     */ 
    public function getFechaVencimiento()
    {
        return $this->FechaVencimiento;
    }

    /**
     * Set the value of FechaVencimiento
     *
     * @return  self
     */ 
    public function setFechaVencimiento($FechaVencimiento)
    {
        $this->FechaVencimiento = $FechaVencimiento;

        return $this;
    }

    /**
     * Get the value of CVV
     */ 
    public function getCVV()
    {
        return $this->CVV;
    }

    /**
     * Set the value of CVV
     *
     * @return  self
     */ 
    public function setCVV($CVV)
    {
        $this->CVV = $CVV;

        return $this;
    }

    /**
     * Get the value of Total
     */ 
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * Set the value of Total
     *
     * @return  self
     */ 
    public function setTotal($Total)
    {
        $this->Total = $Total;

        return $this;
    }

    public function getRespuesta()
    {

        return true;

    }

}
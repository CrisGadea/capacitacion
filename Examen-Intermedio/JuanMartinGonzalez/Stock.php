<?php

class Stock {

    private $stock;
    private $capacidadMaxima;

    public function __construct($capacidadMaxima)
    {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->stock = [];
    }

    /**
     * Devuelve true si pudo agregarlo, falso sino
     */
    public function agregarStock($producto, $cantidad) 
    {
        if(!isset($this->stock[$producto]) && !$this->lleno()){
            $this->stock[$producto] = $cantidad;
            return true;
        }elseif(isset($this->stock[$producto]) && !$this->lleno()){
            $this->stock[$producto] += $cantidad;
            return true;
        }
        return false;
    }

    /**
     * Si no tiene suficiente o no existe el producto devuelve false.
     * Devuelve true si pudo descontar esa cantidad
     */
    public function sacarStock($producto, $cantidad) 
    {
        if(isset($this->stock[$producto]) && $this->stock[$producto] >= $cantidad){
          $this->stock[$producto] -= $cantidad;
          return true;
        }
        return false;
    }

    /**
     * Te dice cuanto stock tiene de cierto produco
     */
    public function cuantoTieneStock($producto) 
    {
        if(isset($this->stock[$producto])){
          return $this->stock[$producto];
        }
        return false;
    }

    /**
     * Te dice si el deposito esta vacio
     */
    public function vacio() 
    {
        $totalDeposito = 0;
        foreach($this->stock as $k => $v){
          $totalDeposito += $v;
        }
        if($totalDeposito){
          return false;
        }
        return true;
    }

    /**
     * te dice si esta lleno
     */
    public function lleno() 
    {
        $totalDeposito = 0;
        foreach($this->stock as $k => $v){
          $totalDeposito += $v;
        }
        if($totalDeposito < $this->capacidadMaxima){
          return false;
        }
        return true;
    }
}
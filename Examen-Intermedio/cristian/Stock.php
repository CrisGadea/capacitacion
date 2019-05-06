<?php

class Stock {

  private $stock;
  private $capacidadMaxima;
  private $total;

  public function __construct($capacidadMaxima) {
    $this->capacidadMaxima=$capacidadMaxima;
    $this->stock=[];
    $this->total=0;
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {

      if (!isset($this->stock[$producto]) && !$this->lleno()) {
        $this->stock[$producto]=$cantidad;
        $this->total+=$cantidad;
        return true;
      }
      elseif (isset($this->stock[$producto]) && !$this->lleno()) {
        $this->stock[$producto]+=$cantidad;
        $this->total+=$cantidad;
        return true;
      }
    return false;
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {
    if (isset($this->stock[$producto]) && $this->stock[$producto]>=$cantidad) {
      $this->stock[$producto]-=$cantidad;
      $this->total-=$cantidad;
      return true;
    }elseif($this->stock[$producto]==0){
      unset($this->stock[$producto]);
      return false;
    }
    
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
      if (isset($this->stock[$producto])) {
        return $this->stock[$producto];
      }
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {
    if (empty($this->stock)) {
      return true;
    }
    foreach ($this->stock as $producto) {
      if (isset($this->stock) && $producto == 0 ){
        return true;
      }
      return false;
    }
      
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
    if ($this->total == $this->capacidadMaxima ) {
      return true;
    }
    return false;
  }
}
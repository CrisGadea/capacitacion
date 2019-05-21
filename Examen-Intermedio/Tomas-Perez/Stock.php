<?php

class Stock {
  Private $capacidad=0;
  private $capacidadMaxima;
  private $stock = array();
  public function __construct($capacidadMaxima) {
    $this->capacidadMaxima=$capacidadMaxima;
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {
    if (($this->capacidad + $cantidad) > $this->capacidadMaxima){
      return false;
    }
      $this->stock [$producto] = $cantidad;
      $this->capacidad +=$cantidad;
      return true;
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {
    if (!isset($this->stock[$producto]) or $this->stock[$producto] < $cantidad){
      return false;
    }
    $this->stock[$producto] = $this->stock[$producto] - $cantidad;
    $this->capacidad -=$cantidad;
    return true;
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
    if (!isset($this->stock[$producto])){
      return 0;
    }
    return $this->stock[$producto];
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {
    if ($this->capacidad == 0){
      return true;
    }else{
      return false;
    }
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
    if ($this->capacidad == $this->capacidadMaxima){
      return true;
    }else{
      return false;
    }
  }
}

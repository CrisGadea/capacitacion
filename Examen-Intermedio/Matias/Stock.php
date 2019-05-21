<?php

class Stock
{

  private $stockP = [];
  private $capacidadMaxima;

  public function __construct($capacidadMaxima)
  {
    $this->capacidadMaxima = $capacidadMaxima;
  }

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad)
  {
    $cantidadDeposito=0;
    foreach ($this->stockP as $key => $value) {
      $cantidadDeposito += $value;
      
    }
    if ($cantidadDeposito + $cantidad <= $this->capacidadMaxima) {
      if(!isset($this->stockP[$producto])) {
        $this->stockP[$producto] = 0;
      }
      $this->stockP[$producto] += $cantidad;
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
    if ($this->stockP[$producto] < $cantidad) {
      return false;
    } else {
      $this->stockP[$producto] -= $cantidad;
      return true;
    }
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto)
  {
    if (!isset($this->stockP[$producto])) {
     return false;
    }
    return $this->stockP[$producto];
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio()
  {
    $totalDeposito=0;
    foreach ($this->stockP as $key => $value) {
      $totalDeposito += $value;
    }
    if ($totalDeposito !== 0) {
      return false;
    }
    return true;
  }

  /**
   * te dice si esta lleno
   */
  public function lleno()
  {
    $cantidadDeposito = 0;
    foreach ($this->stockP as $key => $value) {
      $cantidadDeposito += $value;
    }
    if ($cantidadDeposito < $this->capacidadMaxima) {
      return false;
    }
    return true;
  }
}

<?php

class Stock
{

  private $capacidad;
  private $productos = [];
  public function __construct($capacidadMaxima)
  {
    $this->capacidad = $capacidadMaxima;
  }

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad)
  { 
    $total = 0;
    foreach ($this->productos as $key => $value) {
      $total += $value;
    }

    if(($cantidad + $total) <= $this->capacidad){
      if(!isset($this->productos[$producto])){
        $this->productos[$producto] = $cantidad;  
      } else {
        $this->productos[$producto] += $cantidad;
      }
      return true;
    } else {
      return false;
    }
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad)
  { 
    if(isset($this->productos[$producto])) {
      $this->productos[$producto] -= $cantidad;
      if($this->productos[$producto] == 0) {
        unset($this->productos[$producto]);
      }
    }
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto)
  { 
    foreach ($this->productos as $key => $value) {
        if ($key == $producto){
          return $value;
        }
    }
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio()
  { 
    $total = 0;
    foreach ($this->productos as $key => $value) {
      $total += $value;
    } 

    if($total == 0) {
      return true;
    }
    return false;
  }

  /**
   * te dice si esta lleno
   */
  public function lleno()
  { 
    $total = 0;
    foreach ($this->productos as $key => $value) {
      $total += $value;
    } 

    if($total == $this->capacidad) {
      return true;
    }
    return false;
  }
}

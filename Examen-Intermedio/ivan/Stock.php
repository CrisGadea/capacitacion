<?php

class Stock {

  private $_capacidadMaxima;
  private $productos;
  private $cantidadStock;

  public function __construct($capacidadMaxima) {
    $this->_capacidadMaxima = $capacidadMaxima;
    $this->productos = array();
    $this->cantidadStock = 0;

}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {
    $respuesta = false;
    if($this->_capacidadMaxima >= $this->cantidadStock + $cantidad){
      if( isset($this->productos[$producto])){
        $this->productos[$producto] += $cantidad;
      }else{
        $this->productos[$producto] = $cantidad;
      }
      $respuesta = true;
      $this->cantidadStock += $cantidad;
    }
    return $respuesta;
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {
    $respuesta = false;    
    if( isset( $this->productos[$producto] ) && $this->productos[$producto] >= $cantidad ){
      $this->productos[$producto] -= $cantidad; 
      $this->cantidadStock -= $cantidad;
      $respuesta = true;
    }  
    return $respuesta;
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
    return isset( $this->productos[$producto] ) ? $this->productos[$producto] : 0;
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {
    return $this->cantidadStock == 0 ? true : false;
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
    return $this->cantidadStock === $this->_capacidadMaxima ? true : false;
  }
}

$stock = new Stock(50);
$stock->agregarStock('papa', 10);
var_dump( $stock->cuantoTieneStock('papa'));
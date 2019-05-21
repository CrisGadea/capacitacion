<?php

class Stock {

  private $mercaderia=array();

  private $capacidad;

  public function __construct($capacidadMaxima) {

    $this->capacidadMaxima= $capacidadMaxima;
    $this->capacidad = $capacidadMaxima;
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {

    

    if (empty($this->mercaderia[$producto])) {
        $this->mercaderia[$producto] = $cantidad ;
        $this->capacidadMaxima-=$cantidad;
        return true ;
      }
  
      $this->mercaderia[$producto] = array(
        'producto' => $producto,
        'cantidad' => $cantidad,
      );
      $this->capacidadMaxima-=$cantidad;
      return true;
    }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {

    if ((empty($this->mercaderia[$producto]) || $this->mercaderia[$producto]<$cantidad)) {
      return false;
    }

    $this->mercaderia[$producto] -= $cantidad;
    $this->capacidadMaxima+=$cantidad;
    return true;
  }

  /*
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
   
      return $this->mercaderia[$producto];
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {

    if($this->capacidadMaxima==0)
    {
      return true;
    }

    else{

    return false;}
  }

  

  /**
   * te dice si esta lleno
   */
  public function lleno() {

    if($this->capacidad==$this->capacidadMaxima)
    {
      return true;
    }else{

      return false;
    }

  }
}
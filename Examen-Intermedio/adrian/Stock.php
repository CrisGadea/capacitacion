<?php
 //Adrian Matute
class Stock {

  private $capacidad;
  private $capacidadInicial;
  private $lista;

  public function __construct($capacidadMaxima) {
    $this->capacidadInicial= $capacidadMaxima;
    $this->capacidad = $capacidadMaxima;
}

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {

    if($this->capacidad > 0)
    {
         if(!isset($this->lista[$producto]))
       {
         $this->lista[$producto] = $cantidad;
         $this->capacidad -= $cantidad; 
         return true;
       }
       else{
         $this->lista[$producto] += $cantidad;
         $this->capacidad -= $cantidad; 
         return true;
       }
    }
    else{
      return false;
    }
    
  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) {

    if($this->lista[$producto] >= $cantidad && isset($this->lista[$producto]))
    {
      $this->lista[$producto] -= $cantidad;
      $this->capacidad+= $cantidad;
      return true;
    }
    else{
      return false;
    }
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) {
    if(isset($this->lista[$producto]))
    {
    return $this->lista[$producto];
    }
    else{
      return 0;
    }
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio() {

    if($this->capacidadInicial === $this->capacidad)
    {
      return true;
    }
    else{
      return false;
    }
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() {
    if($this->capacidad === 0)
    {
      return true;
    }
    else{
      return false;
    }
  }
}
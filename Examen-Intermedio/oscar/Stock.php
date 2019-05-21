<?php

class Stock {
  private $stock=array();
  private $numero;
  public function __construct($capacidadMaxima) 
  {

  $this->capacidadMaxima=$capacidadMaxima;
  $this->numero=$capacidadMaxima;
  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  }
  public function agregarStock($producto, $cantidad)
  {
    if(!isset($this->stock[$producto]) and $cantidad <= $this->capacidadMaxima){
      $this->stock[$producto]=$cantidad;
      $this->capacidadMaxima = $this->capacidadMaxima - $cantidad;
      return true;
    }elseif(isset($this->stock[$producto]) and $cantidad <= $this->capacidadMaxima){
      $this->stock[$producto]+=$cantidad;
      $this->capacidadMaxima = $this->capacidadMaxima - $cantidad;
    }
    return false;


  }

  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) 
  {
    if(isset($this->stock[$producto]) and $cantidad <= $this->stock[$producto]){
      $this->stock[$producto]-= $cantidad;
      $this->capacidadMaxima += $cantidad;
      if($this->stock[$producto])
      return true;
    }else{return false;}

  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto) 
  {
    $total;
    foreach ($this->stock as $key => $value) {
      if($key == $producto){
        $total = $value;
       // var_dump($total);
        return $total;
      }
    }
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio()
  {
    if($this->capacidadMaxima == $this->numero){
     // echo 'vacio';
      return true;
    }else{return false;}
  }

  /**
   * te dice si esta lleno
   */
  public function lleno() 
  {
    if($this->capacidadMaxima == 0){
      //echo 'lleno';
      return true;
    }else{return false;}
  }
}

$stock= new Stock(10);
$stock->agregarStock('papa', 3);
$stock->agregarStock('cebolla', 7);

$stock->sacarStock('papa',1);
$stock->vacio();
//var_dump($stock);

$stock->lleno();
echo $stock->cuantoTieneStock('papa');


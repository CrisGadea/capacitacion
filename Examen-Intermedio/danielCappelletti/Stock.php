<?php


//EXAMEN DANIEL CAPPELLETTI

class Stock
{

  private $stock = [];
  public function __construct($capacidadMaxima)
  {

    $this->capacidadMaxima = $capacidadMaxima;
  }



  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad)
  {

    if (!isset($this->stock[$producto])) {
      $this->stock[$producto] = 0;
    }

      if ($this->capacidadMaxima >= $cantidad) {
        $this->stock[$producto] += $cantidad;
        $this->capacidadMaxima = $this->capacidadMaxima - $cantidad;
        return true;
      }


    echo "no se puede agregar producto, capacidad llena";
    return false;
  }


  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad)
  {

    if (isset($this->stock[$producto])) {
      $this->stock[$producto] -= $cantidad;
      $this->capacidadMaxima += $cantidad;
        if ($this->stock[$producto] <= 0) {
          unset($this->stock[$producto]);
         }
       return true;
      }

    echo "No existe el producto que desea sacar o hay menos productos de los que quiere sacar";
    return false;
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto)
  {  $noStock=0;
        if(isset($this->stock[$producto])){
            return $this->stock[$producto];
           }       
       
       return $noStock;     
  
  }

  /**
   * Te dice si el deposito esta vacio
   */
  public function vacio()
  { 
    if(empty($this->stock)){
            echo "El stock esta Vacio";
            return true;
        }
      
      echo "el stock no esta vacio";  
      return false;

  }

  /**
   * te dice si esta lleno
   */
  public function lleno()
  { 
      if($this->capacidadMaxima == 0){
            echo "La capacidad esta llena";
            return true;
        }
    echo "Tiene disponibilidad para " . $this->capacidadMaxima . " productos" . "\n";
    return false;    

  }

}



$stock = new Stock(40);
$stock->agregarStock('Remera', 10);
$stock->agregarStock('Remera', 5);
//$stock->agregarStock('Remera', 5);
//$stock->agregarStock('buzo', 2);
//$stock->agregarStock('buzo', 2);
$stock->agregarStock('jean', 5);
$stock-> agregarStock('jean', 5);

/*$stock->sacarStock('jean', 1);
$stock->sacarStock('buzo', 4);
$stock->sacarStock('Remera', 5);
$stock->sacarStock('buzo',1);*/

//echo $stock->cuantoTieneStock('Remera');
//echo $stock->cuantoTieneStock('jean');
echo $stock->cuantoTieneStock('buzo');

//echo $stock->vacio();

//echo $stock->lleno();

print_r($stock);

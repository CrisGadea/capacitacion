<?php

class Stock {

  private $stock = array();

  public function __construct($capacidadMaxima) 
  {
    $this->capacidadMaxima = $capacidadMaxima;
  }

  /**
   * Devuelve true si pudo agregarlo, falso sino
   */
  public function agregarStock($producto, $cantidad) {
  

  if(empty($this->stock))
        {
            $this->stock[] = ['producto'=> $producto, 'cantidad'=>$cantidad];
        } else {
            $encontro = false;
            foreach($this->stock as $clave => $valor)
            {
                if ($valor['producto'] == $producto && $cantidad < $cantidadMaxima ) {
                    $this->stock[$clave] = ['producto'=> $producto, 'cantidad'=> $valor['cantidad'] + $cantidad];
                    $encontro = true;
                }
            }
            if (!$encontro) {
                $this->stock[] = ['producto' => $producto, 'cantidad' => $cantidad];    
            }
        }
  }
  
  /**
   * Si no tiene suficiente o no existe el producto devuelve false.
   * Devuelve true si pudo descontar esa cantidad
   */
  public function sacarStock($producto, $cantidad) 
  {
    if(empty($this->stock))
    {
        return false;
    }
    unset($this->stock['producto']);
    return true;
  }

  /**
   * Te dice cuanto stock tiene de cierto produco
   */
  public function cuantoTieneStock($producto)
   {
    return $this->stock['producto'];
   }
  
  /**
   * Te dice si el deposito esta vacio
   */


  public function vacio() 
  {
    if(empty($this->stock))
    {
        echo "No hay stock";
        return false;
    } 
    echo "Hay stock";
    return true;
}


  /**
   * te dice si esta lleno
   */
  public function lleno() 
  {
    foreach($this->stock as $k => $v)
    {
        if($v['capacidadMaxima'] = $this->capacidadMaxima)
        {
            echo "Esta lleno";
        }
    }
  }
}
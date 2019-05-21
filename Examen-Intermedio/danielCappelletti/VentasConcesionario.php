<?php
include_once "ConcesionariaInterface.php";
include_once("Concesionaria.php");

//EXAMEN DANIEL CAPPELLETTI

/**
 * EJERCICIO 3
 * 
 * Tenemos un script que por algún poder misterioso del
 * universo no queremos modificarlo salvo que sea realmente
 * necesario.
 * 
 * En este script se hacen muchas compras y ventas de ciertos
 * autos, pero el genente Juan Carlos Mala Onda le parece que los
 * autos de marca Cachavrolet no le estan dando mucha ganancia.
 * Sin modificar el codigo nos gustaría saber el monto total de
 * ganancia que nos da la marca Cachavrolet.
 */

srand(1000);

$marcas = array('FOR', 'Feat', 'Cachavrolet', 'Jonda', 'Tizan');

$concesionario = new Concesionaria();


// MODIFICAR ACA


class TotalGananciaDecorator implements ConcesionariaInterface
{
private $gananciaMarca=0;

  public function __construct(ConcesionariaInterface $_autos)
  {
      $this->_autos= $_autos;
     
  }
 public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio)
 {
      return $this->_autos->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
 }

  public function mostrarAutosDeMarca($marca) 
  {
        return $this->_autos->mostrarAutosDeMarca($marca);
   
  }


  public function venderAutoMarca($marca) 
  {
     
      if($marca == 'Cachavrolet'){
          $ventaAnt= $this->_autos->totalGanado();
          $venta= $this->_autos->venderAutoMarca($marca);
          $despues = $this->_autos->totalGanado();
          $this->gananciaMarca += $despues - $ventaAnt;
        return $venta;
      } 
       
      
      return $this->_autos->venderAutoMarca($marca);
          
  }

  public function totalGanado() 
  {
       return $this->_autos->totalGanado();

  }

 public function gananciaMarca()
 {
    return $this->gananciaMarca;
 }

}

$concesionario = new TotalGananciaDecorator($concesionario);





// HASTA ACA

for($i=0; $i<500; $i++) {
  $n = rand(0, 4);
  $concesionario->agregarAutos($i, $marcas[$n], 'alguno', rand(1990, 2017), rand(100, 1000));
}

for($i=0; $i<20; $i++) {
  $n = rand(0, 4);
  $concesionario->venderAutoMarca($marcas[$n]);
}

// MODIFICAR ACA
// ---- imprimir ganancias por Cachavrolet ----
//echo $concesionario->totalGanado();
echo $concesionario->gananciaMarca();

//print_r($concesionario);



// Hasta aca
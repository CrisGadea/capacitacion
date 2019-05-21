<?php

include_once 'interfaceConsecionaria.php';

include_once("Concesionaria.php");

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

class DecoratorMarca implements interfaceConcesionaria{
  private $chachavrolet=0;


  public function __construct(interfaceConcesionaria $concesionaria)
  {
    $this->concesionaria= $concesionaria;
  }

    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio){
      return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }

    public function mostrarAutosDeMarca($marca){
      return $this->concesionaria->mostrarAutosDeMarca($marca);
    }

    public function venderAutoMarca($marca)
    
    {
      if($marca == "chachavrolet"){
        $antes=$this->concesionaria->totalGanado();
          $resultado=$this->concesionaria->venderAutoMarca($marca);
          $despues=$this->concesionaria->totalGanado();
          $this->chachavrolet+=$despues - $antes;
          return $resultado;
      }else{
        return $this->concesionaria->venderAutoMarca($marca);
      }

    }

    public function totalGanado(){
      return $this->concesionaria->totalGanado();
    }

    public function totalGananciaChavrolet() {
      return $this->chachavrolet;
    }

  }











  $concesionario= new DecoratorMarca($concesionario);




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

echo $concesionario->totalGanado();
// Hasta aca
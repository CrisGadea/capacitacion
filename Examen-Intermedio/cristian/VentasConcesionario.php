<?php
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
interface ConcesionariaInterface{
  public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
  public function mostrarAutosDeMarca($marca);
  public function venderAutoMarca($marca);
  public function totalGanado();
}

class DecoradorConcesionaria implements ConcesionariaInterface{
  private $concesionaria;
  private $ganancia;
  public function __construct($concesionaria)
  {
    $this->concesionaria=$concesionaria;
    $this->ganancia=0;
  }

  public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio){
    return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
  }
  public function mostrarAutosDeMarca($marca){
    return $this->concesionaria->mostrarAutosDeMarca($marca);
  }
  public function venderAutoMarca($marca){
    $antes=0;
    $result=false;
    $despues=0;

    if ($marca=='Cachavrolet') {
      $antes=$this->concesionaria->totalGanado();
      $result=$this->concesionaria->venderAutoMarca($marca);
      $despues=$this->concesionaria->totalGanado();
      $this->ganancia+=$despues - $antes;
      return $result;

    }
    return $this->concesionaria->venderAutoMarca($marca);
  }
  public function totalGanado(){
    return $this->concesionaria->totalGanado();
  }

  public function mostrarGanancias(){
    return $this->ganancia;
  }

}
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
$decorador = new DecoradorConcesionaria($concesionario);
$decorador->venderAutoMarca('Cachavrolet');
echo $decorador->mostrarGanancias();
// Hasta aca
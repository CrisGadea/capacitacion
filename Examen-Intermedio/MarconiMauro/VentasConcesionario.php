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
/*de cierta marca detectemos de cuantos se vendieron 'vender' el decorador 
debe vender el la concesionaria y verificar cuanto gano
guardarlo en la clase y return del vender
antes de vender preguntar cuanto gano*/
class ConcesionariaDecorator
{
  private $principio = 0;
  private $actual = 0;
  private $montototal = 0;

    public function venderAutoMarca($marca)
    {
      if ($marca == 'Cachavrolet'){
          $principio = $montototal;
          $result = $this->concesionaria->venderMarca($marca);
          $actual->montototal;
          $this->montototal = $actual - $principio;
          return $result;
      }
      return $this->concesionaria->venderMarca($marca);
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
$concesionario->totalGanado();
// Hasta aca
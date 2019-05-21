<?php
  //Adrian Matute
include_once("Concesionaria.php");

class DecoratorVenta
{
    private $concesionaria;
    private $ganancias;

    public function __construct(ConcesionariaInterface $concesionaria)
    {
        $this->concesionaria = $concesionaria;
        $this->ganancias = 0;
    }

    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio) {

        if($marca === 'Cachavrolet')
        {
            return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
        }
        else {
            return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
        }
    }
  
    public function mostrarAutosDeMarca($marca) {
        return $this->concesionaria->mostrarAutosDeMarca($marca);
    }
  
    public function venderAutoMarca($marca) {

        if($marca === 'Cachavrolet')
        {
            $saldoInicial = $this->concesionaria->totalGanado();
            $venta = $this->concesionaria->venderAutoMarca($marca);
            $saldoFinal = $this->concesionaria->totalGanado();
            
            $ganancias = $saldoFinal - $saldoInicial;
            $this->ganancias += $ganancias;
            
            return $venta;
        }
        else{
            return $this->concesionaria->venderAutoMarca($marca);
        }
    }
  
    public function totalGanado() {
        return $this->concesionaria->totalGanado();
    }

    public function ganancia()
    {
        return $this->ganancias;
    }
}
<?php
include_once "ConcesionariaInterface.php";
class CachavroletDecorator implements ConcesionariaInterface
{
    private $concesionaria;
    private $gananciasCachavrolet = 0;

    public function __construct(ConcesionariaInterface $concesionaria)
    {
        $this->concesionaria = $concesionaria;
    }
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio)
    {   
        return $this->concesionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }
    public function mostrarAutosDeMarca($marca)
    {
        return $this->mostrarAutosDeMarca($marca);
    }
    public function venderAutoMarca($marca)
    {   
        if($marca == 'Cachavrolet'){
            $totalAnterior = $this->concesionaria->totalGanado();
            $venta = $this->concesionaria->venderAutoMarca($marca);
            $this->gananciasCachavrolet += $this->concesionaria->totalGanado() - $totalAnterior;
            return $venta;
        }
        return $this->concesionaria->venderAutoMarca($marca);
    }
    public function totalGanado()
    {
        return $this->concesionaria->totalGanado();
    }
    public function totalGananaciasCachavrolet()
    {
        return $this->gananciasCachavrolet;
    }
}

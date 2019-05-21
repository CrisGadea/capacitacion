<?php
include_once("Concesionaria.php");
include_once("ConcesionariaInterface.php");

class DecoratorChachavrolet implements ConcesionariaInterface
{
    private $_autos = array();
    private $_totalGanado = 0;
    private $gananciasChevro = 0;
    private $concesionaria;

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
        $this->concesionaria->mostrarAutosDeMarca($marca);
    }

    public function venderAutoMarca($marca)
    {
        if ($marca == 'Cachavrolet') {
            $totalAntesDeVender = $this->concesionaria->totalGanado();

            $venta = $this->concesionaria->venderAutoMarca($marca);

            $totalDespuesDeVender = $this->concesionaria->totalGanado();

            $this->gananciasChevro += $totalDespuesDeVender - $totalAntesDeVender;

            return $venta;
        }

        return $this->concesionaria->venderAutoMarca($marca);
    }

    public function totalGanado()
    {
        return $this->concesionaria->totalGanado();
    }

    public function gananciasChevro()
    {
        return $this->gananciasChevro;
    }
}

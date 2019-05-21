<?php

class Cachavrolet implements ConcesionariaInterface
{
    public function __construct(ConcesionariaInterface $concesionaria )
    {
        $this->concesionaria = $concesionaria;
    }
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio)
    {
        return $this->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }

    public function mostrarAutosDeMarca($marca)
    { 
        return $this->mostrarAutosDeMarca($marca);
    }
    public function venderAutoMarca($marca)
    { 
        if ($marca == 'Cachavrolet') {
            $ventas = $this->totalGanado();
            $resultado=$this->Concesionaria->venderAutoMarca($marca);
            $ventasDes = $this->totalGanado();
            $this->totalGanado += $ventasDes - $ventas;
            return $resultado;
        }
        return $this->Concesionaria->venderAutoMarca($marca);
    }
    public function totalGanado()
    { 
        return $this->totalGanado;
    }
}

<?php


Class ConcesionariaDecorada implements VentasInterface
{
    private $decorator;
    private $ganancia;

    public function __construct(VentasInterface $concesionaria)
    {
        $this->decorator= $concesionaria;

    }
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio)
    {
        $this->decorator->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }
    public function mostrarAutosDeMarca($marca)
    {
        $this->decorator->mostrarAutosDeMarca();
    }
    public function venderAutoMarca($marca)
    {
        
        if($marca === 'Cachavrolet'){

            $nueva=$this->decorator->totalGanado();
            $respuesta=$this->decorator->venderAutoMarca($marca);
            $final=$this->decorator->totalGanado();
            $this->ganancia+=$final-$nueva;
            return $respuesta;
        }else{return $this->decorator->venderAutoMarca($marca);
            
        }




    }
    public function totalGanado()
    {
        $this->decorator->totalGanado();
    }
    public function gananciasChevrolet()
    {
        echo $this->ganancia;
        return $this->ganancia;
    }






}
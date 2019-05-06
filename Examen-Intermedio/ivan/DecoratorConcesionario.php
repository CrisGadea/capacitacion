<?php
require_once "./Concesionaria.php";

class DecoratorConcesionario implements ConcesionarioInterface{
    private $_concecionaria;
    private $_ganancias;

    public function __construct($concesionaria){
        $this->_concecionaria = $concesionaria;
        $this->_ganancias = 0;
    }
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio) : bool{
        return $this->_concecionaria->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    }
    public function mostrarAutosDeMarca($marca):array{
        return $this->_concecionaria->mostrarAutosDeMarca($marca);
    }
    public function venderAutoMarca($marca):bool{
        if($marca === 'Cachavrolet'){
            $gananciaInicial = $this->_concecionaria->totalGanado();
            $respuesta = $this->_concecionaria->venderAutoMarca($marca);
            $gananciaFinal = $this->_concecionaria->totalGanado();
            $this->_ganancias += ($gananciaFinal - $gananciaInicial);
        }else{
            $respuesta = $this->_concecionaria->venderAutoMarca($marca);
        }
        return $respuesta;
    }
    public function totalGanado():int{
        return $this->_concecionaria->totalGanado();
    }

    public function totalGanadoCachavrolet():int{
        return $this->_ganancias;
    }
}
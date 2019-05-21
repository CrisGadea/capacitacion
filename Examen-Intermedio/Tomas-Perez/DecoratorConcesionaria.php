<?php
require_once "./Concesionaria.php";

Class DecoratorConcesionaria implements interfaceDecorator {
    private $totalC;
    private $concecionario;
    public function __construct($concesionario){
        $this->concesionario = $concesionario;
        $this->totalC = 0;
    }
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio){
        return $this->concesionario->agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
      }
    public function mostrarAutosDeMarca($marca){
        return $this->concesionario->mostrarAutosDeMarca($marca);
      }
    public function venderAutoMarca($marca){

        if ($marca=='Cachavrolet'){
          $temp = $this->concesionario->totalGanado ();
          $temp3= $this->concesionario->venderAutoMarca($marca);
          $temp2 = $this->concesionario->totalGanado ();
          $this->totalC += ($temp2 - $temp);
          return $temp3;
        }else{
        return $this->concesionario->venderAutoMarca($marca);}
      }
    public function totalGanado(){
        return $this->concesionario->totalGanado(); 
      }
    public function totalVentas(){
        return $this->totalC;
    }
    
}

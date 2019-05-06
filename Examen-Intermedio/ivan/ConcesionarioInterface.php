<?php

interface ConcesionarioInterface{
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio) : bool;
    public function mostrarAutosDeMarca($marca):array;
    public function venderAutoMarca($marca):bool;
    public function totalGanado():int;
}
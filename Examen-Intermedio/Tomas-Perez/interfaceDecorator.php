<?php

interface interfaceDecorator {
    public function agregarAutos($idReferencia, $marca, $modelo, $anio, $precio);
    public function mostrarAutosDeMarca($marca);
    public function venderAutoMarca($marca);
    public function totalGanado();
}
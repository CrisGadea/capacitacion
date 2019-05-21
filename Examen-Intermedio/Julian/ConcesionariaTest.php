<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function testExistsConcesionaria() {
        $this->assertTrue(class_exists("Concesionaria"));
      }
    
    public function testAgregarAutoTest(){
    $_autos= new Concesionaria();
    $this->assertTrue($_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000));
}
public function testAgregarAutosTest(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $_autos->agregarAutos(1123,'chevrolette','aveo',2006,60000);
    $_autos->agregarAutos(1124,'chevrolette','aveo',2007,60000);
    $this->assertEquals(
        3,
        count($_autos->mostrarAutosDeMarca('chevrolette'))
      );
}

public function testmostrarAutosDeMarca(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $this->assertEquals(
        1,
        count($_autos->mostrarAutosDeMarca('chevrolette'))
      );

}
public function testSiNoEstaLaMarca(){
    $_autos= new Concesionaria();
    $this->assertEquals(
        0,
        count($_autos->mostrarAutosDeMarca('chevrolette'))
      );
}

public function testVenderAutoMarca(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $_autos->venderAutoMarca('chevrolette');
    $this->assertEquals(
        0,
        count($_autos->mostrarAutosDeMarca('chevrolette'))
      );
}
public function testVenderAutosMarca(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $_autos->agregarAutos(1123,'nissan','aveo',2005,60000);
    $_autos->agregarAutos(1124,'ford','aveo',2005,60000);
    $_autos->agregarAutos(1125,'dario','aveo',2005,60000);
    $_autos->venderAutoMarca('nissan');
    $_autos->venderAutoMarca('ford');
    $_autos->venderAutoMarca('dario');
    $_autos->venderAutoMarca('chevrolette');
    $this->assertEquals(
        0,
        count($_autos->mostrarAutosDeMarca('chevrolette'))
      );
}
public function testVenderElAutoMasCaro(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $_autos->agregarAutos(1123,'chevrolette','aveo',2005,70000);
    $_autos->agregarAutos(1124,'chevrolette','aveo',2005,80000);
    $_autos->venderAutoMarca('chevrolette');
    $this->assertEquals(80000,($_autos->totalGanado()));
}
public function testTotalGanado(){
    $_autos= new Concesionaria();
    $_autos->agregarAutos(1122,'chevrolette','aveo',2005,60000);
    $_autos->agregarAutos(1123,'chevrolette','aveo',2005,70000);
    $_autos->agregarAutos(1124,'chevrolette','aveo',2005,80000);
    $_autos->agregarAutos(1125,'capitan','aveo',2005,70000);
    $_autos->agregarAutos(1126,'capitan','aveo',2005,80000);
    $_autos->venderAutoMarca('chevrolette');
    $_autos->venderAutoMarca('capitan');
    $this->assertEquals(160000,($_autos->totalGanado()));
}
}
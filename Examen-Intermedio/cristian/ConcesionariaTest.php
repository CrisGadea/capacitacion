<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function crearConcesionaria(){
        $concesionaria=new Concesionaria();
        return $concesionaria;
    }

    public function testExisteConcesionaria(){
        $this->assertTrue(class_exists("Concesionaria"));
    }

    public function testAgregarAutos(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertTrue($concesionaria->agregarAutos(1122,"fiat","v1",2007,140000));
        $this->assertTrue($concesionaria->agregarAutos(1133,"audi","tt",2012,400000));

    }

    public function testNoPuedoAgregarAutoConUnIdExistente(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertFalse($concesionaria->agregarAutos(1111,"audi","tt",2012,400000));
    }

    public function testMostrarAutosDeMarca(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertEquals([['id'=>1111,'marca'=>"peugeot",'modelo'=>"207",'anio'=>2009,'precio'=>180000]],$concesionaria->mostrarAutosDeMarca("peugeot"));

    }

    public function testVenderAutoDeMarca(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertTrue($concesionaria->agregarAutos(1122,"fiat","f1",2004,120000));
        $this->assertTrue($concesionaria->agregarAutos(1133,"peugeot","c1",2005,140000));
        $this->assertTrue($concesionaria->venderAutoMarca("peugeot"));
        $this->assertEquals(180000,$concesionaria->totalGanado());

    }

    public function testNoPuedoVenderAutoSiMarcaNoExiste(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertFalse($concesionaria->venderAutoMarca("fiat"));
    }

    public function testMostrarTotalGanado(){
        $concesionaria=$this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1111,"peugeot","207",2009,180000));
        $this->assertTrue($concesionaria->venderAutoMarca("peugeot"));
        $this->assertEquals(180000,$concesionaria->totalGanado());

    }
}
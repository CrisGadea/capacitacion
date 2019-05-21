<?php

require_once('./vendor/autoload.php');
require ('./Concesionaria.php');

use PHPUnit\Framework\TestCase;

final class TestConsesionaria extends TestCase
{
    public function testCrearConcesionaria()
    {
        $con = new Concesionaria;
        return $con;
    }

    public function testClaseExiste()
    {
        $this->assertTrue(class_exists("Concesionaria"));
    }

    public function testAgregarAutos()
    {
        $con = new Concesionaria;
        $this->assertTrue($con->agregarAutos(23, "Audi", "A4", 2015, 120000));
        $this->assertTrue($con->agregarAutos(2, "Audi", "Neo", 2013, 200000));
        $this->assertTrue($con->agregarAutos(13, "Toyota", "4x4", 2007, 78000));
    }

    public function testMostrarAutosDeMarca()
    {
        $marcado = array();
        $con = new Concesionaria;
        $this->assertEquals($marcado ,$con->mostrarAutosDeMarca('Audi'));
    }

    public function testVenderAutoMarca()
    {
        $con = new Concesionaria;
        $con->agregarAutos(2, "Audi", "Neo", 2013, 200000);
        $con->agregarAutos(13, "Toyota", "4x4", 2007, 78000);
        $this->assertTrue($con->venderAutoMarca("Audi"));
        $this->assertTrue($con->venderAutoMarca("Toyota"));
    }

    public function testTotalGanado()
    {
        $con = new Concesionaria;
        $con->agregarAutos(44, "Renault", "12", 1995, 15000);
        $con->venderAutoMarca("Renault");
        $this->assertEquals(15000, $con->totalGanado());
    }
}
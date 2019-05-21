<?php
//Adrian Matute
require_once './vendor/autoload.php';
require_once 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function crearConcesionaria()
    {
        $concesionaria = new Concesionaria();
        return $concesionaria;
    }

    public function testAgregarAutos()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
    }

    public function testAgregarAutosIdRepetidos()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertFalse($concesionaria->agregarAutos(2525, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertFalse($concesionaria->agregarAutos(2525, 'MERCEDEZ', 'XP', 2019, 50000));
    }

    public function testAgregarConAnioIncorrecto()
    {//no deberia permitir agregar autos con año negativo y fuera de rango
        $concesionaria = $this->crearConcesionaria();
        $this->assertFalse($concesionaria->agregarAutos(2525, 'audi', 'XX', -1200, 3000));
        $this->assertFalse($concesionaria->agregarAutos(2515, 'alfaRomeo', 'Z', -20, 5000));
        $this->assertFalse($concesionaria->agregarAutos(2425, 'MERCEDEZ', 'XP', -89, 2000));
        $this->assertFalse($concesionaria->agregarAutos(2425, 'MERCEDEZ', 'XP', 1, 2000));
    }

    public function testMostrarAutoQueNoExiste()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));

        $this->assertEquals(array(), $concesionaria->mostrarAutosDeMarca('toyota'));
    }

    public function testMostrarAutosDeMarcas()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));

        $this->assertEquals(array(0=>array("id" => 3389, "marca" => 'MERCEDEZ', "modelo" =>'XP', "anio" =>2019, "precio" =>50000)
                                                                              ), $concesionaria->mostrarAutosDeMarca('MERCEDEZ'));
    }

    public function testMostrarVariosAutos()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 30000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));

        $this->assertEquals(array(0=>array("id" => 3389, "marca" => 'MERCEDEZ', "modelo" =>'XP', "anio" =>2019, "precio" =>50000),
                                  1=>array("id" => 1383, "marca" => 'MERCEDEZ', "modelo" =>'LP', "anio" =>2014, "precio" =>30000),
                                  2=>array("id" => 8383, "marca" => 'MERCEDEZ', "modelo" =>'QA', "anio" =>2017, "precio" =>90000)), 
        $concesionaria->mostrarAutosDeMarca('MERCEDEZ'));
    }

    public function testVentaDeAuto()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 30000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));

        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
    }

    public function testVenderAntesDeAgregar()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertFalse($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 30000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));
    }

    public function testVentaDeAutoQueNoExiste()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 30000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));

        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertFalse($concesionaria->venderAutoMarca('toyota'));
        $this->assertFalse($concesionaria->venderAutoMarca('HUmmer'));
    }

    public function testTotalGanado()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 50000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 30000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));
        $this->assertEquals(0, $concesionaria->totalGanado());

        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertEquals(90000, $concesionaria->totalGanado());
        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
        $this->assertFalse($concesionaria->venderAutoMarca('toyota'));
        $this->assertFalse($concesionaria->venderAutoMarca('HUmmer'));
        $this->assertEquals(140000, $concesionaria->totalGanado());
    }

    public function testTiposDeDatosIncorrectos()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertFalse($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 'tresmill'));
        $this->assertFalse($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 'ochomil'));
        $this->assertFalse($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 'cincomil'));
        $this->assertFalse($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 'doce'));
        $this->assertFalse($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 'trece'));
        $this->assertFalse($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, true));
        $this->assertEquals(0, $concesionaria->totalGanado());
//No deberia permitirse agregar un auto que no tenga un tipo no numerico como precio
//cuando se desea hacer la venta y el total ganado falla por que los tipos no corresponden
//tampoco se podria ejecutar el total ganado
        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
    }

    public function testAutosDelMismoValor()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(2525, 'audi', 'XX', 2000, 30000));
        $this->assertTrue($concesionaria->agregarAutos(2323, 'alfaRomeo', 'Z', 2012, 80000));
        $this->assertTrue($concesionaria->agregarAutos(3389, 'MERCEDEZ', 'XP', 2019, 90000));
        $this->assertTrue($concesionaria->agregarAutos(1383, 'MERCEDEZ', 'LP', 2014, 90000));
        $this->assertTrue($concesionaria->agregarAutos(8383, 'MERCEDEZ', 'QA', 2017, 90000));
        $this->assertEquals(0, $concesionaria->totalGanado());

        $this->assertTrue($concesionaria->venderAutoMarca('MERCEDEZ'));
    }
}
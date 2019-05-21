<?php




include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function testAgregarAuto()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
    }
    public function testAgregarIdRepetido()
    {

        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
        $this->assertFalse($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));

    }
    public function testMostrarCantidadDeAutosPorMarca()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
        $this->assertTrue($concesionaria->agregarAutos(6526, 'ferrari', 'enzo', 2018, 30000));
        $this->assertTrue($concesionaria->agregarAutos(7283, 'bmw', 'r7', 2018, 30000));
        $this->assertTrue($concesionaria->agregarAutos(783, 'bmw', 'r', 2019, 30000));

        $this->assertEquals(2, count($concesionaria->mostrarAutosDeMarca('bmw')));

    }
    public function testMostrarMarcaQueNoExiste()
    {
        $concesionaria = new Concesionaria();
        $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
        $this->assertTrue($concesionaria->agregarAutos(6526, 'ferrari', 'enzo', 2018, 30000));
        $this->assertTrue($concesionaria->agregarAutos(7283, 'bmw', 'r7', 2018, 30000));
        $this->assertFalse($concesionaria->mostrarAutosDeMarca('chevrolet'));
        //retorna un array vacio
    }
    public function testVenderAutoMasCaro()
    {
    $concesionaria = new Concesionaria();
    $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
    $this->assertTrue($concesionaria->agregarAutos(6526, 'audi', 'enzo', 2018, 20000));
    $this->assertTrue($concesionaria->agregarAutos(7283, 'audi', 'r7', 2018, 10000));
    $concesionaria->venderAutoMarca('audi');
    $this->assertEquals(30000,$concesionaria->totalGanado());

    }
    public function testVenderAutoQueNoHay()
    {
    $concesionaria = new Concesionaria();
    $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
    $this->assertFalse($concesionaria->venderAutoMarca('ferrari'));
    }
    public function testTotalDeVentas()
    {
    $concesionaria = new Concesionaria();
    $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
    $this->assertTrue($concesionaria->agregarAutos(6526, 'audi', 'enzo', 2018, 20000));
    $this->assertTrue($concesionaria->agregarAutos(7283, 'audi', 'r7', 2018, 10000));
    $concesionaria->venderAutoMarca('audi');
    $concesionaria->venderAutoMarca('audi');
    $this->assertEquals(50000,$concesionaria->totalGanado());

    }
    public function testAgregarVenderYAgregarAuto()
    {
    $concesionaria = new Concesionaria();

    $this->assertTrue($concesionaria->agregarAutos(1342, 'audi', 'r8', 2018, 30000));
    $this->assertTrue($concesionaria->venderAutoMarca('audi'));

    $this->assertTrue($concesionaria->agregarAutos(6526, 'ferrari', 'enzo', 2018, 20000));
    $this->assertTrue($concesionaria->venderAutoMarca('ferrari'));

    }
 
      
}

/*
agregarAutos
mostrarAutosDeMarca
venderAutoMarca
totalGanado*/
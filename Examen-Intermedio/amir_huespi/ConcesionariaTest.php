<?php
/**
 * 
 * Tareas:
 *  - Bajar composer
 *  - Instalar phpunit
 *  - Revisar los tests
 *  - Leer la explicación de la clase
 *  - Que pasen los tests
 *  - Conquistar el mundo
 *  - Aprobar el curso!
 * 
 */
include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    public function testExistsConcesionaria()
    {
        $this->assertTrue(class_exists("Concesionaria"));
    }
    public function testAgregarAuto()
    {
        $c = new Concesionaria();

        $this->assertTrue($c->agregarAutos(1, 'renault', 'megane', 2010, 20000));
    }
    public function testAgregarMasDeUnAuto()
    {
        $c = new Concesionaria();

        $this->assertTrue($c->agregarAutos(1, 'renault', 'megane', 2010, 20000));
        $this->assertTrue($c->agregarAutos(2, 'renault', '12', 2010, 20000));
        $this->assertTrue($c->agregarAutos(3, 'renault', 'kwid', 2010, 20000));
        $this->assertTrue($c->agregarAutos(4, 'renault', 'captur', 2010, 20000));
        $this->assertTrue($c->agregarAutos(5, 'renault', 'megane 2', 2010, 20000));
        $this->assertTrue($c->agregarAutos(6, 'renault', 'megane 2', 2010, 20000));
    }
    public function testNoAgregarAuto()
    {
        $c = new Concesionaria();
        $c->agregarAutos(1, 'renault', 'megane', 2010, 20000);
        $c->agregarAutos(2, 'renault', '12', 2010, 20000);
        $c->agregarAutos(3, 'renault', 'kwid', 2010, 20000);
        $c->agregarAutos(4, 'renault', 'captur', 2010, 20000);
        $c->agregarAutos(5, 'renault', 'gol', 2010, 20000);
        $c->agregarAutos(6, 'renault', 'country', 2010, 20000);
        $c->agregarAutos(7, 'renault', 'gol 2', 2010, 20000);
        $this->assertFalse($c->agregarAutos(1, 'renault', 'megane', 2010, 20000));
        $this->assertFalse($c->agregarAutos(5, 'renault', 'megane', 2010, 20000));
        $this->assertFalse($c->agregarAutos(7, 'renault', 'megane', 2010, 20000));
        $this->assertFalse($c->agregarAutos(2, 'renault', 'megane', 2010, 20000));
    }
    public function testMostrarAutos()
    {
        $c = new Concesionaria();
        $c->agregarAutos(1, 'renault', 'megane', 2010, 20000);
        $c->agregarAutos(2, 'renault', '12', 2010, 20000);

        $this->assertEquals(
            [
                ["id" => 1, "marca" => 'renault', "modelo" => 'megane', "anio" => 2010, "precio" => 20000],
                ["id" => 2, "marca" => 'renault', "modelo" => '12', "anio" => 2010, "precio" => 20000]
            ],
            $c->mostrarAutosDeMarca('renault')
        );
    }

    public function testVenderAuto()
    {
        $c = new Concesionaria();
        $c->agregarAutos(1, 'renault', 'megane', 2010, 30000);
        $c->agregarAutos(2, 'renault', '12', 2010, 20000);

        $c->venderAutoMarca('renault');
        $this->assertEquals(30000, $c->totalGanado());

        $c->venderAutoMarca('renault');
        $this->assertEquals(50000, $c->totalGanado());
    }

    public function testNoVende()
    {
        $c = new Concesionaria();

        $c->agregarAutos(1, 'renault', 'megane', 2010, 30000);
        $c->agregarAutos(2, 'renault', 'captur', 2010, 20000);
        $c->agregarAutos(3, 'renault', 'kwid', 2010, 50000);
        $c->agregarAutos(4, 'renault', '12', 2010, 10000);

        $c->venderAutoMarca('renault');
        $this->assertTrue($c->venderAutoMarca('renault'));
        $c->venderAutoMarca('renault');
        $this->assertTrue($c->venderAutoMarca('renault'));
        $c->venderAutoMarca('renault');
        $c->venderAutoMarca('renault');

        $this->assertFalse($c->venderAutoMarca('renault'));
    }

    public function testTotalGanado()
    {
        $c = new Concesionaria();

        $c->agregarAutos(1, 'renault', 'megane', 2010, 30000);
        $this->assertEquals([["id" => 1, "marca" => 'renault', "modelo" => 'megane', "anio" => 2010, "precio" => 30000]], $c->mostrarAutosDeMarca('renault'));
        
        $c->agregarAutos(2, 'renault', 'captur', 2010, 20000);
        $this->assertEquals([
            ["id" => 1, "marca" => 'renault', "modelo" => 'megane', "anio" => 2010, "precio" => 30000],
            ["id" => 2, "marca" => 'renault', "modelo" => 'captur', "anio" => 2010, "precio" => 20000]
        ], $c->mostrarAutosDeMarca('renault'));
        
        $c->agregarAutos(3, 'renault', 'kwid', 2010, 50000);
        $this->assertEquals([
            ["id" => 1, "marca" => 'renault', "modelo" => 'megane', "anio" => 2010, "precio" => 30000],
            ["id" => 2, "marca" => 'renault', "modelo" => 'captur', "anio" => 2010, "precio" => 20000],
            ["id" => 3, "marca" => 'renault', "modelo" => 'kwid', "anio" => 2010, "precio" => 50000]
        ], $c->mostrarAutosDeMarca('renault'));
        
        $c->agregarAutos(4, 'renault', '12', 2010, 10000);
            $this->assertEquals([
                ["id" => 1, "marca" => 'renault', "modelo" => 'megane', "anio" => 2010, "precio" => 30000],
                ["id" => 2, "marca" => 'renault', "modelo" => 'captur', "anio" => 2010, "precio" => 20000],
                ["id" => 3, "marca" => 'renault', "modelo" => 'kwid', "anio" => 2010, "precio" => 50000],
                ["id" => 4, "marca" => 'renault', "modelo" => '12', "anio" => 2010, "precio" => 10000]
            ], $c->mostrarAutosDeMarca('renault'));
        $c->venderAutoMarca('renault');
        $this->assertEquals(50000, $c->totalGanado());
        $c->venderAutoMarca('renault');
        $this->assertEquals(80000, $c->totalGanado());
        $c->venderAutoMarca('renault');
        $this->assertEquals(100000, $c->totalGanado());
        $c->venderAutoMarca('renault');

        $this->assertEquals(110000, $c->totalGanado());
    }
}

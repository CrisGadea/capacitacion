<?php

require_once('./vendor/autoload.php');
require('./Concesionaria.php');

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
    /**
     * @return Concesionaria
     */
    public function crearConcesionaria()
    {
        $concesionaria = new Concesionaria();
        return $concesionaria;
    }

    public function testExistsConcesionaria()
    {
        $this->assertTrue(class_exists("Concesionaria"));
    }
    public function testAgregarAuto()
    {
        $concesionaria = $this->crearConcesionaria();
        $this->assertTrue($concesionaria->agregarAutos(10, 'honda', 'fit', 2012, 100000));
        $this->assertTrue($concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000));
        $this->assertTrue($concesionaria->agregarAutos(12, 'chevrolet', 'cruze', 2017, 300000));
        $this->assertTrue($concesionaria->agregarAutos(13, 'honda', 'fit', 2012, 100000));
        $this->assertTrue($concesionaria->agregarAutos(14, 'ford', 'focus', 2015, 200000));
        $this->assertTrue($concesionaria->agregarAutos(15, 'chevrolet', 'cruze', 2017, 300000));
    }
    public function testMostrarAutosDeMarca()
    {
        $concesionaria = $this->crearConcesionaria();
        $concesionaria->agregarAutos(10, 'ford', 'ka', 2009, 100000);
        $concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000);
        $concesionaria->agregarAutos(12, 'ford', 'kinect', 2018, 300000);
        $arrayFord = [
            '0' => [
                'id' => 10,
                'marca' => 'ford',
                'modelo' => 'ka',
                'anio' => 2009,
                'precio' => 100000,
            ],
            '1' => [
                'id' => 11,
                'marca' => 'ford',
                'modelo' => 'focus',
                'anio' => 2015,
                'precio' => 200000,
            ],
            '2' => [
                'id' => 12,
                'marca' => 'ford',
                'modelo' => 'kinect',
                'anio' => 2018,
                'precio' => 300000,
            ],

        ];
        $this->assertEquals($arrayFord, $concesionaria->mostrarAutosDeMarca('ford'));
    }
    public function testMostrarAutosDeMarcaNoExiste()
    {
        $concesionaria = $this->crearConcesionaria();
        $concesionaria->agregarAutos(10, 'ford', 'ka', 2009, 100000);
        $concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000);
        $concesionaria->agregarAutos(12, 'ford', 'kinect', 2018, 300000);
        $arrayFord = [
            '0' => [
                'id' => 10,
                'marca' => 'ford',
                'modelo' => 'ka',
                'anio' => 2009,
                'precio' => 100000,
            ],
            '1' => [
                'id' => 11,
                'marca' => 'ford',
                'modelo' => 'focus',
                'anio' => 2015,
                'precio' => 200000,
            ],
            '2' => [
                'id' => 12,
                'marca' => 'ford',
                'modelo' => 'kinect',
                'anio' => 2018,
                'precio' => 300000,
            ],

        ];
        $this->assertNotEquals($arrayFord, $concesionaria->mostrarAutosDeMarca('chevrolet'));
    }

    public function testVenderAutoMarca()
    {
        $concesionaria = $this->crearConcesionaria();
        $concesionaria->agregarAutos(10, 'ford', 'ka', 2009, 100000);
        $concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000);
        $concesionaria->agregarAutos(12, 'ford', 'kinect', 2018, 300000);
        $concesionaria->agregarAutos(13, 'chevrolet', 'cruze', 2017, 300000);
        $arrayFord = [
            '0' => [
                'id' => 10,
                'marca' => 'ford',
                'modelo' => 'ka',
                'anio' => 2009,
                'precio' => 100000,
            ],
            '1' => [
                'id' => 11,
                'marca' => 'ford',
                'modelo' => 'focus',
                'anio' => 2015,
                'precio' => 200000,
            ],
            '2' => [
                'id' => 12,
                'marca' => 'ford',
                'modelo' => 'kinect',
                'anio' => 2018,
                'precio' => 300000,
            ],

        ];
        $this->assertTrue($concesionaria->venderAutoMarca('ford'));
    }
    
    public function testVenderAutoMarcaNoExiste()
    {
        $concesionaria = $this->crearConcesionaria();
        $concesionaria->agregarAutos(10, 'ford', 'ka', 2009, 100000);
        $concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000);
        $concesionaria->agregarAutos(12, 'ford', 'kinect', 2018, 300000);
        $arrayFord = [
            '0' => [
                'id' => 10,
                'marca' => 'ford',
                'modelo' => 'ka',
                'anio' => 2009,
                'precio' => 100000,
            ],
            '1' => [
                'id' => 11,
                'marca' => 'ford',
                'modelo' => 'focus',
                'anio' => 2015,
                'precio' => 200000,
            ],
            '2' => [
                'id' => 12,
                'marca' => 'ford',
                'modelo' => 'kinect',
                'anio' => 2018,
                'precio' => 300000,
            ],

        ];
        $this->assertFalse($concesionaria->venderAutoMarca('chevrolet'));
    }
    public function testTotalGanado()
    {
        $concesionaria = $this->crearConcesionaria();
        $concesionaria->agregarAutos(10, 'ford', 'ka', 2009, 100000);
        $concesionaria->agregarAutos(11, 'ford', 'focus', 2015, 200000);
        $concesionaria->agregarAutos(12, 'ford', 'kinect', 2018, 300000);
        $concesionaria->agregarAutos(12, 'chevrolet', 'cruze', 2017, 300000);
        $arrayFord = [
            '0' => [
                'id' => 10,
                'marca' => 'ford',
                'modelo' => 'ka',
                'anio' => 2009,
                'precio' => 100000,
            ],
            '1' => [
                'id' => 11,
                'marca' => 'ford',
                'modelo' => 'focus',
                'anio' => 2015,
                'precio' => 200000,
            ],
            '2' => [
                'id' => 12,
                'marca' => 'ford',
                'modelo' => 'kinect',
                'anio' => 2018,
                'precio' => 300000,
            ],

        ];
        $concesionaria->venderAutoMarca('ford');
        $this->assertEquals(300000,$concesionaria->totalGanado());
    }
}


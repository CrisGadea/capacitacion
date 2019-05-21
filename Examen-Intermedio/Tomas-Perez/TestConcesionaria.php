<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class CatalogoNetflixTest extends TestCase
{
    public function testAgregarAuto(){
        $auto=new Concesionaria;
        $this->assertTrue($auto->agregarAutos(1,'ford','fiesta',2010,202000));
        $this->assertTrue($auto->agregarAutos(2,'fiat','palio',2019,300000));
        $this->assertTrue($auto->agregarAutos(3,'bmw','M5',2010,900000));
    }
    public function testAgregarAuto2vecesConElMismoID(){
        $auto=new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $this->assertFalse($auto->agregarAutos(1,'ford','fiesta',2010,202000));
    }
    public function testVenderAutoMarca(){
        $auto=new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $this->assertTrue($auto->venderAutoMarca('ford'));
    }
    public function testmostrarAutosDeMarca(){
        $auto= new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $this->assertEquals(1,count($auto->mostrarAutosDeMarca('ford')));
    }
    public function testVenderAutoQueNoExiste(){
        $auto=new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $this->assertFalse($auto->venderAutoMarca('fiat'));
    }
    public function testVender2VecesElMismoAuto(){
        $auto=new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $this->assertTrue($auto->venderAutoMarca('ford'));
        $this->assertFalse($auto->venderAutoMarca('ford'));

    }
    public function testTotalGanado(){
        $auto=new Concesionaria;
        $auto->agregarAutos(1,'ford','fiesta',2010,202000);
        $auto->agregarAutos(2,'fiat','palio',2019,300000);
        $auto->agregarAutos(3,'bmw','M5',2010,900000);
        $auto->venderAutoMarca('fiat');
        $auto->venderAutoMarca('ford');
        $this->assertEquals(502000,$auto->totalGanado());
    }
}
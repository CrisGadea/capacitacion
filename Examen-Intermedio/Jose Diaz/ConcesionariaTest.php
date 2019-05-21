<?php

include './vendor/autoload.php';
include 'Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{

  public function testAgregarAutoEnSlotOcupado() {
    $obj = new Concesionaria();
    $obj->agregarAutos(1122, "Ford",'Focus', 2019, 500000);

    $this->assertFalse($obj->agregarAutos(1122, "Ford",'Focus', 2019, 500000));
  }

  public function testAgregarAuto() {
    $obj = new Concesionaria();
    $this->assertTrue($obj->agregarAutos(1122, "Ford",'Focus', 2019, 500000));
  }

  public function testMostrarAutoDeMarca() {
    $obj = new Concesionaria();
    $obj->agregarAutos(1122, "Volkswagen",'Gol', 2019, 700000);
    $obj->agregarAutos(1123, "Ford",'Fiesta', 2013, 500000);
    $obj->agregarAutos(1124, "Ford",'Mustang', 2019, 1500000);
    $obj->agregarAutos(1125, "Fiat",'Palio', 2014, 300000);
    $obj->agregarAutos(1126, "Chevrolet",'Camaro', 2019, 500000);
    
    $this->assertEquals([
                         ['id'=>1123,'marca'=>'Ford','modelo'=>'Fiesta','anio'=> 2013,'precio'=> 500000],
                         ['id'=>1124,'marca'=>'Ford','modelo'=>'Mustang','anio'=> 2019,'precio'=> 1500000]],
                         $obj->mostrarAutosDeMarca("Ford"));
  }

  public function testVenderAutoMasCaroDeMarca(){
    $obj = new Concesionaria();
    $obj->agregarAutos(1122, "Ford",'Focus', 2019, 700000);
    $obj->agregarAutos(1123, "Ford",'Fiesta', 2013, 500000);
    $obj->agregarAutos(1124, "Ford",'Mustang', 2019, 1500000);
    $obj->agregarAutos(1125, "Ford",'Escort', 2014, 300000);
    $obj->agregarAutos(1126, "Ford",'Ranger', 2019, 600000);
    
    $this->assertTrue($obj->venderAutoMarca("Ford"));
  }
  
public function testDespuesDeLaVentaSeRetiraDeStock() {
        $obj = new Concesionaria();
        $obj->agregarAutos(1122, "Ford",'Focus', 2019, 700000);
        $obj->agregarAutos(1123, "Ford",'Fiesta', 2013, 500000);
        $obj->agregarAutos(1124, "Ford",'Mustang', 2019, 1500000);
        $obj->agregarAutos(1125, "Ford",'Escort', 2014, 300000);
        $obj->agregarAutos(1126, "Ford",'Ranger', 2019, 600000);
        $obj->venderAutoMarca('Ford');
        $this->assertTrue($obj->venderAutoMarca("Ford"));
}

public function testVenderAutoQueNoExiste() {
    $obj = new Concesionaria();
    $obj->agregarAutos(1122, "Ford",'Focus', 2019, 700000);
    $obj->agregarAutos(1123, "Ford",'Fiesta', 2013, 500000);
    $obj->agregarAutos(1124, "Ford",'Mustang', 2019, 1500000);
    $obj->agregarAutos(1125, "Ford",'Escort', 2014, 300000);
    $obj->agregarAutos(1126, "Ford",'Ranger', 2019, 600000);
    $this->assertFalse($obj->venderAutoMarca("Susuki"));
}

public function testMostrarTotalDeVentas() {
    $obj = new Concesionaria();
    $obj->agregarAutos(1122, "Ford",'Focus', 2019, 700000);
    $obj->agregarAutos(1123, "Ford",'Fiesta', 2013, 500000);
    $obj->agregarAutos(1124, "Ford",'Mustang', 2019, 1500000);
    $obj->agregarAutos(1125, "Ford",'Escort', 2014, 300000);
    $obj->agregarAutos(1126, "Ford",'Ranger', 2019, 600000);
    $obj->venderAutoMarca('Ford');
    $obj->venderAutoMarca('Ford');
    $this->assertEquals((2200000),($obj->totalGanado()));
}
}
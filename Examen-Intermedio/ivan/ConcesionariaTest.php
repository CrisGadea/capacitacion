<?php

require_once('./vendor/autoload.php');
require('./Concesionaria.php');

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{
  /**
   * @return Concesionaria
   */
  public function crearConcesionaria() {
    $concesionaria = new Concesionaria();
    return $concesionaria;
  }

  public function testExistsConcesionaria() {
    $this->assertTrue(class_exists("Concesionaria"));
  }

  public function testAgregarUno() {
    $concesionaria = $this->crearConcesionaria();
    $this->assertTrue($concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000));
  }

  public function testAgregarUnico() {
    $concesionaria = $this->crearConcesionaria();
    $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
    $this->assertFalse($concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000));
  }

  public function testMostrarAutosDeMarca() {
    $concesionaria = $this->crearConcesionaria();
    $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
    $concesionaria->agregarAutos(2,'TOYOTA','Corolla',2009,300000);
    $concesionaria->agregarAutos(3,'HONDA','Fit',2017,430000);
    $this->assertEquals(array( 
        array(
            'id' => 2,
            'marca' => 'TOYOTA',
            'modelo' => 'Corolla',
            'anio' => 2009,
            'precio' => 300000
        )
    ),$concesionaria->mostrarAutosDeMarca('TOYOTA')
    );

    $this->assertEquals(array( 
        array(
            'id' => 1,
            'marca' => 'HONDA',
            'modelo' => 'Acord',
            'anio' => 1992,
            'precio' => 98000
        ),array(
            'id' => 3,
            'marca' => 'HONDA',
            'modelo' => 'Fit',
            'anio' => 2017,
            'precio' => 430000
          )
        ),$concesionaria->mostrarAutosDeMarca('HONDA')
    );
  }

  public function testMostrarAutosDeMarcaSinStock() {
      $concesionaria = $this->crearConcesionaria();
      $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
      $concesionaria->agregarAutos(2,'TOYOTA','Corolla',2009,300000);
      $this->assertEquals([],$concesionaria->mostrarAutosDeMarca('FORD'));
  }

  public function testVenderAuto() {
    $concesionaria = $this->crearConcesionaria();
    $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
    $concesionaria->agregarAutos(2,'TOYOTA','Corolla',2009,300000);
    $this->assertFalse($concesionaria->venderAutoMarca('PEUGEOT'));
    $this->assertTrue($concesionaria->venderAutoMarca('HONDA'));

  }

  public function testVenderMasCaro() {
    $concesionaria = $this->crearConcesionaria();
    $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
    $concesionaria->agregarAutos(2,'TOYOTA','Corolla',2009,300000);
    $concesionaria->agregarAutos(3,'HONDA','Fit',2017,430000);
    $concesionaria->agregarAutos(4,'TOYOTA','Chachara',2019,1200000);

    $this->assertTrue($concesionaria->venderAutoMarca('TOYOTA'));
    $this->assertEquals(1200000,$concesionaria->totalGanado());

    //no vende el mas barato
    
    $this->assertTrue($concesionaria->venderAutoMarca('HONDA'));
    $this->assertFalse(1200000 + 98000 == $concesionaria->totalGanado());

    
  }

  public function testTotalGanado() {
    $concesionaria = $this->crearConcesionaria();
    $concesionaria->agregarAutos(1,'HONDA','Acord',1992,98000);
    $concesionaria->agregarAutos(2,'TOYOTA','Corolla',2009,300000);
    $concesionaria->agregarAutos(3,'HONDA','Fit',2017,430000);
    $concesionaria->agregarAutos(4,'TOYOTA','Chachara',2019,1200000);
    $concesionaria->agregarAutos(5,'FORD','Ka',2000,100000);
    $concesionaria->agregarAutos(6,'FORD','Fiesta',2011,320000);
    $concesionaria->agregarAutos(7,'HONDA','City',2017,380000);
    $concesionaria->agregarAutos(8,'TOYOTA','Chachara2',2019,2000000);
    $total = 0;
    $this->assertTrue($concesionaria->venderAutoMarca('TOYOTA'));
    $this->assertEquals($total +=2000000,$concesionaria->totalGanado());    
    $this->assertTrue($concesionaria->venderAutoMarca('HONDA'));
    $this->assertEquals($total += 430000,$concesionaria->totalGanado());    
    $this->assertTrue($concesionaria->venderAutoMarca('TOYOTA'));
    $this->assertEquals($total += 1200000,$concesionaria->totalGanado());    
    $this->assertTrue($concesionaria->venderAutoMarca('HONDA'));
    $this->assertEquals($total += 380000,$concesionaria->totalGanado());
    $this->assertTrue($concesionaria->venderAutoMarca('HONDA'));
    $this->assertEquals($total += 98000,$concesionaria->totalGanado());
    $this->assertFalse($concesionaria->venderAutoMarca('HONDA'));
    $this->assertEquals($total,$concesionaria->totalGanado());


  }

  
}
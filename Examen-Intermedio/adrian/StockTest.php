<?php
 //Adrian Matute
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
include 'Stock.php';
 
use PHPUnit\Framework\TestCase;

final class StockTest extends TestCase
{
  public function testArrancaVacio() {
    $stock = new Stock(50);
    $this->assertTrue($stock->vacio());
  }

  public function testAgregarAlgo() {
    $stock = new Stock(50);
    $stock->agregarStock('papa', 10);
    $this->assertFalse($stock->vacio());
    $this->assertFalse($stock->lleno());
    $this->assertEquals(10, $stock->cuantoTieneStock('papa'));
  }

  public function testAgregarVariasCosas() {
    $stock = new Stock(50);
    $stock->agregarStock('papa', 1);
    $stock->agregarStock('cebolla', 2);
    $stock->agregarStock('camionero', 3);
    $stock->agregarStock('zapato', 4);
    $this->assertEquals(1, $stock->cuantoTieneStock('papa'));
    $this->assertEquals(2, $stock->cuantoTieneStock('cebolla'));
    $this->assertEquals(3, $stock->cuantoTieneStock('camionero'));
    $this->assertEquals(4, $stock->cuantoTieneStock('zapato'));
  }

  public function testAgregarYSacarAlgo() {
    $stock = new Stock(50);
    $stock->agregarStock('papa', 10);
    $this->assertFalse($stock->vacio());
    $this->assertFalse($stock->lleno());
    $this->assertEquals(10, $stock->cuantoTieneStock('papa'));

    $stock->sacarStock('papa', 10);
    $this->assertTrue($stock->vacio());
    $this->assertFalse($stock->lleno());
    $this->assertEquals(0, $stock->cuantoTieneStock('papa'));
  }

  public function testSacarAlgoDeAPocoHastaQuedarVacio() {
    $stock = new Stock(50);
    $stock->agregarStock('papa', 10);
    $this->assertEquals(10, $stock->cuantoTieneStock('papa'));
    $stock->sacarStock('papa', 3);
    $this->assertEquals(7, $stock->cuantoTieneStock('papa'));
    $stock->sacarStock('papa', 6);
    $this->assertEquals(1, $stock->cuantoTieneStock('papa'));
    $stock->sacarStock('papa', 1);
    $this->assertTrue($stock->vacio());
    $this->assertFalse($stock->lleno());
    $this->assertEquals(0, $stock->cuantoTieneStock('papa'));
  }

  public function testAgregarYSacarYAgregarAlgo() {
    $stock = new Stock(50);
    $stock->agregarStock('papa', 10);
    $stock->sacarStock('papa', 5);
    $stock->sacarStock('papa', 5);
    $stock->agregarStock('papa', 1);

    $this->assertFalse($stock->vacio());
    $this->assertFalse($stock->lleno());
    $this->assertEquals(1, $stock->cuantoTieneStock('papa'));
  }

  public function testProbarQueSeLlena() {
    $stock = new Stock(10);
    $stock->agregarStock('papa', 3);
    $stock->agregarStock('cebolla', 7);
    $this->assertFalse($stock->vacio());
    $this->assertTrue($stock->lleno());
    $stock->sacarStock('papa', 1);
    $this->assertFalse($stock->vacio());
    $this->assertFalse($stock->lleno());
    $stock->agregarStock('cebolla', 1);
    $this->assertFalse($stock->vacio());
    $this->assertTrue($stock->lleno());
  }

  public function testUnaVezLlenoNoTeDejaAgregar() {
    $stock = new Stock(10);
    $stock->agregarStock('pepas', 5);
    $stock->agregarStock('medias', 5);
    $this->assertFalse($stock->agregarStock('camion', 5));
    $this->assertEquals(0, $stock->cuantoTieneStock('camion'));
  }
}
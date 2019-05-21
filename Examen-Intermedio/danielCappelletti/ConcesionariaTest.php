<?php

//EXAMEN DANIEL CAPPELLETTI

include './vendor/autoload.php';
include './Concesionaria.php';

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase
{



public function testPuedeAgregarAuto()
{
    $agencia = new Concesionaria();
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
  
}

public function testPuedeAgregarVarios()
{
    $agencia = new Concesionaria();
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
    $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
    $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));

}

public function testMuestraAutoMarca()
{
    $agencia = new Concesionaria();
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
    $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
    $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));
    
    $this->assertEquals([[
        'id' => 1001,
        'marca' => 'Toyota',
        'modelo' => 'Hilux',
        'anio' => 2019,
        'precio' => 250.000,

    ]], $agencia->mostrarAutosDeMarca('Toyota'));
}

public function testMuestraVariosDeLaMarca()
{
    $agencia = new Concesionaria();
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
    $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
    $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1005, 'Renault', 'fluece', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1006, 'Renault', 'clio', 2019, 250.000));
    $this->assertTrue($agencia->agregarAutos(1007, 'Renault', 'megane', 2019, 250.000));
    
    $this->assertEquals([[
        'id' => 1004,
        'marca' => 'Renault',
        'modelo' => 'sandero',
        'anio' => 2019,
        'precio' => 250.000,

    ],
    [
        'id' => 1005,
        'marca' => 'Renault',
        'modelo' => 'fluece',
        'anio' => 2019,
        'precio' => 250.000,

    ],
    [
        'id' => 1006,
        'marca' => 'Renault',
        'modelo' => 'clio',
        'anio' => 2019,
        'precio' => 250.000,

    ],
    [
        'id' => 1007,
        'marca' => 'Renault',
        'modelo' => 'megane',
        'anio' => 2019,
        'precio' => 250.000,

    ]
], $agencia->mostrarAutosDeMarca('Renault'));
}


  public function testVendeAutoMascaroDeLaMarca()
  {
       $agencia = new Concesionaria();
        $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
        $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
        
        $this->assertTrue($agencia->venderAutoMarca('Toyota'));
        $this->assertEquals(250.000,$agencia->totalGanado());

  }

 public function testSiNoQuedanAutosDeLaMarcaNoVende()
 {
        $agencia = new Concesionaria();
        $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
        $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1005, 'Renault', 'fluece', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1006, 'Renault', 'clio', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1007, 'Renault', 'megane', 2019, 250.000));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));

        $this->assertFalse($agencia->venderAutoMarca('Renault'));


 }


  public function testSacaAutoDelaMarcaloUnaVezVendido()
  {     
        $agencia = new Concesionaria();
        $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
        $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
        $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1005, 'Renault', 'fluece', 2019, 200.000));
        $this->assertTrue($agencia->agregarAutos(1006, 'Renault', 'clio', 2019, 220.000));
        $this->assertTrue($agencia->agregarAutos(1007, 'Renault', 'megane', 2019, 200.000));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Renault'));
       
        $this->assertFalse($agencia->venderAutoMarca('Renault'));
        $this->assertEquals(870.000, $agencia->totalGanado());          

  }


  public function testMuestraTotal()
  {
    $agencia = new concesionaria(); 
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 300.000));
        $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
        $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
        $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 250.000));
        $this->assertTrue($agencia->agregarAutos(1005, 'Renault', 'fluece', 2019, 200.000));
        $this->assertTrue($agencia->agregarAutos(1006, 'Renault', 'clio', 2019, 220.000));
        $this->assertTrue($agencia->agregarAutos(1007, 'Renault', 'megane', 2019, 200.000));

        $this->assertTrue($agencia->venderAutoMarca('Toyota'));
        $this->assertTrue($agencia->venderAutoMarca('Ford'));

        $this-> assertEquals(530.000, $agencia->totalGanado());

  }



  public function testTeSumaElTotalDeElMasCaroDeVariosConOtro()
  {
    $agencia = new concesionaria(); 
    $this->assertTrue($agencia->agregarAutos(1001, 'Toyota', 'Hilux', 2019, 300.000));
        $this->assertTrue($agencia->agregarAutos(1002, 'Ford', 'ka', 2019, 230.000));
        $this->assertTrue($agencia->agregarAutos(1003, 'chervrolet', 'onix', 2013, 100.000));
        $this->assertTrue($agencia->agregarAutos(1004, 'Renault', 'sandero', 2019, 240.000));
        $this->assertTrue($agencia->agregarAutos(1005, 'Renault', 'fluece', 2019, 200.000));
        $this->assertTrue($agencia->agregarAutos(1006, 'Renault', 'clio', 2019, 220.000));
        $this->assertTrue($agencia->agregarAutos(1007, 'Renault', 'megane', 2019, 200.000));

        $this->assertTrue($agencia->venderAutoMarca('Renault'));
        $this->assertTrue($agencia->venderAutoMarca('Ford'));


        $this-> assertEquals(470.000, $agencia->totalGanado());
  }












}
























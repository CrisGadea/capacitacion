<?php
 
require_once './vendor/autoload.php';
 
use PHPUnit\Framework\TestCase;
 
final class ConcesionariaTest extends TestCase
{
 
    public function testExisteConcesionaria()
    {
        $this->assertTrue(class_exists("Concesionaria"));
    }
    public function testQueAgregueAutos(){
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $this->assertEquals(1, count($concesionaria->mostrarAutosDeMarca('Audi')));
    }
    public function testMostrarAutosDeMarca()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $arrayAudi = [
            '0' => [
                'id' => 111,
                'marca' => 'Audi',
                'modelo' => 'A5',
                'anio' => 2019,
                'precio' => 90000,
             ],
             '1' => [
                'id' => 113,
                'marca' => 'Audi',
                'modelo' => 'A3',
                'anio' => 2018,
                'precio' => 75000,
             ],
             '2' => [
                'id' => 114,
                'marca' => 'Audi',
                'modelo' => 'x1',
                'anio' => 2017,
                'precio' => 95000,
             ],

        ];
        
        
        $this->assertEquals($arrayAudi, $concesionaria->mostrarAutosDeMarca('Audi'));
    }
    public function testQueVendaAuto()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $this->assertTrue($concesionaria->venderAutoMarca('BMW'));
    }
    public function testDelTotalGanado()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->agregarAutos(115, 'Fiat', '500', 2016, 20000);
        $concesionaria->agregarAutos(116, 'Mercedes Benz', 'slk320', 2016, 78000);
        $concesionaria->agregarAutos(117, 'Audi', 'X3', 2019, 95000);
        $concesionaria->agregarAutos(118, 'Lamborghini', 'Diablo', 2017, 155000);
        $concesionaria->venderAutoMarca('Fiat');
        $concesionaria->venderAutoMarca('Fiat');  
        $this->assertEquals(205000, $concesionaria->totalGanado());
    }
    public function testQueVendaElAutoMAsCaro()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $concesionaria->venderAutoMarca('Audi');
        $this->assertEquals(95000, $concesionaria->totalGanado());
    }
    public function testQueNoAgregueUnAutoExistente()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->venderAutoMarca('Audi');
        $this->assertFalse($concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000));
    }
    public function testMostrarAutosDespuesDeHaberAgregadoYVendido()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(111, 'Audi', 'A5', 2019, 90000);
        $concesionaria->agregarAutos(112, 'BMW', '380', 2017, 50000);
        $concesionaria->agregarAutos(113, 'Audi', 'A3', 2018, 75000);
        $concesionaria->agregarAutos(114, 'Audi', 'x1', 2017, 95000);
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->agregarAutos(115, 'Fiat', '500', 2016, 20000);
        $concesionaria->agregarAutos(116, 'Mercedes Benz', 'slk320', 2016, 78000);
        $concesionaria->agregarAutos(117, 'Audi', 'X3', 2019, 95000);
        $concesionaria->agregarAutos(118, 'Lamborghini', 'Diablo', 2017, 155000);
        $concesionaria->venderAutoMarca('Fiat');
        $concesionaria->venderAutoMarca('Fiat'); 
        $this->assertEquals(2, count($concesionaria->mostrarAutosDeMarca('Audi')));
    }
    public function testQueDevuelva0SiNoQuedaAuto()
    {
        $concesionaria = new Concesionaria;
        $concesionaria->agregarAutos(116, 'Mercedes Benz', 'slk320', 2016, 78000);
        $concesionaria->agregarAutos(117, 'Audi', 'X3', 2019, 95000);
        $concesionaria->agregarAutos(118, 'Lamborghini', 'Diablo', 2017, 155000);
        $concesionaria->venderAutoMarca('Mercedes Benz');
        $concesionaria->venderAutoMarca('Audi');
        $concesionaria->venderAutoMarca('Lamborghini');
        $this->assertEquals(0, $concesionaria->venderAutoMarca('Lamborghini'));
    }
 
}
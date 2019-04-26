<?php
require_once('./vendor/autoload.php');
require('CasiBuscaMinas.php');

use PHPUnit\Framework\TestCase;

final class CasiBuscaMinaTest extends TestCase
{
    public function testExisteBuscaMina()
    {
        $this->assertTrue(class_exists("BuscaMinas"));
    }

    public function crearBuscaMina()
    {
        $buscaMina = new BuscaMinas(3,3);
        return $buscaMina;
    }

    public function testAgregarMina()
    {
        $buscaMina = $this->crearBuscaMina();
        $buscaMina->agregarMina(2,3);
        $buscaMina->jugar(2,3);
        $this->assertFalse($buscaMina->gano());
        $this->assertTrue($buscaMina->terminoDeJugar());
    }

    public function testAgregarMinaRepetida()
    {
        $buscaMina = $this->crearBuscaMina();
        $buscaMina->agregarMina(2,3);
        $buscaMina->agregarMina(2,3);
        $this->assertTrue($buscaMina->terminoDeJugar());
        //Este test falla ya que no está validado en el código el hecho de agregar una mina donde ya había
    }

    public function testJugar()
    {
        $buscaMina = $this->crearBuscaMina();
        $buscaMina->agregarMina(2,3);
        $buscaMina->agregarMina(1,3);
        $buscaMina->agregarMina(2,2);
        $buscaMina->jugar(1,1);
        $this->assertFalse($buscaMina->gano());
        $this->assertFalse($buscaMina->terminoDeJugar());
        $buscaMina->jugar(2,3);
        $this->assertFalse($buscaMina->gano());
        $this->assertTrue($buscaMina->terminoDeJugar());
    }

    public function testTerminoDeJugar()
    {
        $buscaMina = $this->crearBuscaMina();
        $buscaMina->agregarMina(1,1);
        $buscaMina->agregarMina(2,3);
        $buscaMina->agregarMina(3,3);
        $buscaMina->sacarMina(1,1);
        $buscaMina->sacarMina(2,3);
        $buscaMina->sacarMina(3,3);
        $this->assertTrue($buscaMina->terminoDeJugar());
        $this->assertTrue($buscaMina->gano());

        $buscaMina2 = $this->crearBuscaMina();
        $buscaMina2->agregarMina(1,1);
        $buscaMina2->jugar(1,1);
        $this->assertTrue($buscaMina2->terminoDeJugar());
        $this->assertFalse($buscaMina2->gano());


    }

    public function testGano()
    {
        $buscaMina = $this->crearBuscaMina();
        $buscaMina->agregarMina(1,1);
        $buscaMina->sacarMina(1,1);
        $this->assertTrue($buscaMina->gano());

        $buscaMina2 = $this->crearBuscaMina();
        $buscaMina2->agregarMina(1,1);
        $buscaMina2->jugar(1,2);
        $buscaMina2->jugar(1,0);
        $buscaMina2->jugar(2,1);
        $buscaMina2->jugar(2,2);
        $buscaMina2->jugar(2,0);
        $buscaMina2->jugar(0,1);
        $buscaMina2->jugar(0,2);
        $buscaMina2->jugar(0,0);
        $this->assertTrue($buscaMina->terminoDeJugar());
    }

    public function testPerdio()
    {
        
    }

    public function testSacarMina()
    {
        
    }


}
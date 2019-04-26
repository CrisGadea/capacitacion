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

    public function testCrearBuscaMina()
    {

    }

    public function testAgregarMina()
    {

    }

    public function testJugar()
    {
        
    }

    public function testTerminoDeJugar()
    {
        
    }

    public function testGano()
    {
        
    }

    public function testSacarMina()
    {
        
    }


}
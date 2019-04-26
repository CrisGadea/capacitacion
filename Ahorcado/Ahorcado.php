  <?php

require './vendor/autoload.php';

class Ahorcado {
  private $palabra;
  private $intentos;

  public function __construct($palabra, $intentos) {
    $this->palabra = $palabra;
    $this->intentos = $intentos;
  }
  public function damePalabra() {
    return $this->palabra;
  }

  public function dameIntentos() {
    return $this->intentos;
  }

  public function mostrarTablero() {
    return "_ _ _ _ _";
  }
}
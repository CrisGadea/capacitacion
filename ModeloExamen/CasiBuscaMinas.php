<?php

class BuscaMinas {

  private $minas = array();
  private $perdio = false;
  private $termino = false;
  private $cantidadMinas = 0;

  public function __construct($ancho, $largo) {
    for($i=0; $i<$ancho; $i++) {
      for($j=0; $j<$largo; $j++) {
        $this->minas[$i][$j] = 0;
      }
    }
  }

  public function agregarMina($x, $y) {
    $this->minas[$x][$y] = -9999;
    $this->cantidadMinas += 1;

    if (isset($this->minas[$x-1][$y-1])) {
      $this->minas[$x-1][$y-1] += 1;
    }
    if (isset($this->minas[$x  ][$y-1])) {
      $this->minas[$x  ][$y-1] += 1;
    }
    if (isset($this->minas[$x+1][$y-1])) {
      $this->minas[$x+1][$y-1] += 1;
    }
    if (isset($this->minas[$x-1][$y  ])) {
      $this->minas[$x-1][$y  ] += 1;
    }
    if (isset($this->minas[$x+1][$y  ])) {
      $this->minas[$x+1][$y  ] += 1;
    }
    if (isset($this->minas[$x-1][$y+1])) {
      $this->minas[$x-1][$y+1] += 1;
    }
    if (isset($this->minas[$x  ][$y+1])) {
      $this->minas[$x  ][$y+1] += 1;
    }
    if (isset($this->minas[$x+1][$y+1])) {
      $this->minas[$x+1][$y+1] += 1;
    }
  }

  public function jugar($x, $y) {
    if ($this->minas[$x][$y]>0) {
      return $this->minas[$x][$y];
    }
    $this->perdio = true;
    return false;
  }

  public function terminoDeJugar() {
    return $this->perdio || $this->termino;
  }

  public function gano() {
    return !$this->perdio && $this->termino;
  }

  public function sacarMina($x, $y) {
    $this->minas[$x][$y] = 0;
    $this->cantidadMinas -= 1;
    if ($this->cantidadMinas == 0) {
      $this->termino = true;
      $this->perdio = false;
    }

    if (isset($this->minas[$x-1][$y-1])) {
      $this->minas[$x-1][$y-1] += 1;
    }
    if (isset($this->minas[$x  ][$y-1])) {
      $this->minas[$x  ][$y-1] += 1;
    }
    if (isset($this->minas[$x+1][$y-1])) {
      $this->minas[$x+1][$y-1] += 1;
    }
    if (isset($this->minas[$x-1][$y  ])) {
      $this->minas[$x-1][$y  ] += 1;
    }
    if (isset($this->minas[$x+1][$y  ])) {
      $this->minas[$x+1][$y  ] += 1;
    }
    if (isset($this->minas[$x-1][$y+1])) {
      $this->minas[$x-1][$y+1] += 1;
    }
    if (isset($this->minas[$x  ][$y+1])) {
      $this->minas[$x  ][$y+1] += 1;
    }
    if (isset($this->minas[$x+1][$y+1])) {
      $this->minas[$x+1][$y+1] += 1;
    }
  }
}
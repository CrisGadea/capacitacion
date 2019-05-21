<?php

/**
 * Como programadores de Global HITSS debemos ser capaces de programar
 * un robot. Nuestro robot va a tener una bateria y cada vez que
 * nos movemos vamos a gastar algo de bateria. Lo bueno es que
 * somos tan buenos programadores que nuestro robot es un robot
 * cuantico que cada vez que se mueve gasta una cantidad fija
 * de bateria porque el robot hace saltos cuanticos. Nuestra
 * tecnologia cuantica gasta MUCHA bateria y cada vez que salta
 * gasta 10 puntos de bateria. Lamentablemente nuestra tecnologia para
 * baterias es bastante mala (porque no podemos ser buenos en todo)
 * y solo tenemos 100 de bateria. La otra limitacion es que el robot
 * siempre arranca en la posicion (0, 0) que en nuestro caso
 * son las oficinas el punto central del universo. Apartir de ahí
 * se puede mover donde quieran.
 * 
 * Metodos:
 *    - cargar:
 *        Carga al 100% nuestra bateria, osea carga los 100puntos
 *        de bateria
 *    - bateria:
 *        Nos dice cuantos puntos de bateria tenemos
 *    - posicionX:
 *        Nos dice en que posicion X del universo estamos. Recuerden
 *        que el universo esta centrado en las oficinas de Global HITSS.
 *    - posicionY:
 *        Nos dice en que posicion Y del universo estamos.
 *    - mover(x, y):
 *        Hacemos un salto cuantico a las posiciones X e Y del universo
 * 
 */

class Robot {
<<<<<<< HEAD

  private $cargaDeBateria;
  private $X;
  private $Y;

  public function __construct()
  {
    $this->cargaDeBateria=0;
    $this->X=0;
    $this->Y=0;
  }


  public function cargar() {
   $this->cargaDeBateria=100;

  }

  public function bateria() {
    return $this->cargaDeBateria;

  }

  public function posicionX() {
    
    return $this->X;
  }

  public function posicionY() {
    return $this->Y;
  }

  public function mover($x, $y) {
    if ($this->cargaDeBateria>0) {
      $this->X = $x;
      $this->Y = $y;
      $this->cargaDeBateria-=10;
      return true;
    }
    return false;
=======
  // para realizar operaciones con la bateria, vamos a declararla como un atributo de la clase
  // una vez realizado eso, la igualamos en 0 que es donde va a partir todo
  // posterior a esto va a tener un sistema de carga en el que podamos agregarle valor a esa bateria

  public $bateria= 0;
  //la posicion también se iguala a 0, ya que originalmente estaremos quietos
  public $x= 0;
  public $y= 0;

  public function cargar() {
    //cuando instanciemos el metodo "cargar", este va a tomar con "$this", la bateria
    //que está afuera y declaramos previamente, y a ese 0 que teníamos, lo va a reemplazar por 100
    //o el número que nosotros querramos,
    $this->bateria=100;
  }

  public function bateria() {
    //Este metodo solo debe mostrar el nivel de batería actual
    //si ya lo cargamos, será el numero que cargamos, y sino, será 0;
    return $this->bateria;
  }

  public function posicionX() {
    //esta funcion solo muestra la posicion X, así que vamos a necesitar declararla previamente como hicimos con la bateria
    //una vez realizado esto, deberé retornar la posicion.

    return $this->x;
  }

  public function posicionY() {
    return $this->y;
  }

  public function mover($x, $y) {
    //mover va a tener que tener una condicion, que especifique que gasta 10 de bateria cada vez que se mueva;
    //esa condicion va a estar dada por un if
    //en esta condicion estamos diciendo, que si la bateria, al restarle 10, es menor a 0, retorne falso, porque no se puede realizar el movimiento
    if ($this->bateria -10 < 0) {

      return false;
    }
    //aca estoy diciendo, que voy a tomar este atributo declarado previamente, ya sea x o y, lo voy a guardar en una variable propia de la funcion, en este caso con su mismo nombre
    //voy a usar si o si 10 de bateria declarada previamente, y si todo se pudo, voy a devolver un true;
    //porque el robot pudo moverse;
    $this->x=$x;
    $this->y=$y;
    $this->bateria-=10;
    return true;

>>>>>>> 127226f7d02d7e19ea6696e6513a54d855fac487
  }
}
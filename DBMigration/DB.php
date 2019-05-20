<?php

class Cola {

  private $_data = array();

  public function encolar($element) {
    $this->_data[] = $element;
  }

  public function desencolar() {
    return array_shift($this->_data);
  }

  public function estaVacia() {
    return count($this->_data) == 0;
  }

}

class Persona {
  private $nombre;
  private $dni;
  public function __construct($nombre, $dni) {
    $this->nombre = $nombre;
    $this->dni = $dni;
  }

  public function dameNombre() { return $this->nombre; }
  public function dameDNI() { return $this->dni; }
}

class DB {
  private $data = array();

  public function insert($id, $obj) {
    $this->data[$id] = $obj;
  }

  public function delete($id) {
    // borrar la key $id de data
  }

  public function get($id) {
    // devolver data[$id]
  }

  public function getAll() {
    // devolver data
  }
}

class Cluster {

  private $dbs = array();
  private $cola;

  public function __construct($cola) {
    $this->cola = $cola;
  }

  public function guardar(Persona $persona) {
    $a_donde = $persona->dameDNI() % count($this->dbs);
    $this->dbs[$a_donde][$persona->dameDNI()] = $persona;
    // no va mas con arreglos, ahora son DB
    // dbs[donde]->insert(id, usuario)
  }

  public function borrar(Persona $persona) {
    $a_donde = $persona->dameDNI() % count($this->dbs);
    unset($this->dbs[$a_donde][$persona->dameDNI()]);
    // aca no va mas el unset deberia ser
    // dbs[donde]->delete( id )
  }

  public function agregarDB(DB $db) {
    $this->dbs[] = $db;
    foreach ($this->dbs as $dbKey => $db) {
      foreach ($db->getAll() as $keyUsuario => $usuario) {
        $a_donde = $usuario->dameDNI() % count($this->dbs);
        if ($a_donde != $dbKey) {
          $this->cola->encolar($usuario);
        }
      }
    }
  }

  public function migrar() {
    while(!$this->cola->estaVacia()) {
      $usuario = $this->cola->desencolar();

      // estas cuentas quedan igual que antes
      $viejoLugar = $usuario->dameDNI() % (count($this->dbs)-1);
      $nuevoLugar = $usuario->dameDNI() % count($this->dbs);

      // esto ya no van, deberian ser
      // db->delete
      // db->insert
      unset($this->dbs[$viejoLugar][$usuario->dameDNI()]);
      $this->dbs[$nuevoLugar][$usuario->dameDNI()] = $usuario;
    }
  }

  public function mostarResumen() {
    foreach ($this->dbs as $dbKey => $db) {
      echo "DB: $dbKey - Cantidad: ".count($db)."\n";
      //echo "DB: $dbKey - Cantidad: ".count($db->getall())."\n";
    }
  }
}


$cluster = new Cluster(3, new Cola());

$db = new DB();
$cluster->agregarDB($db);
$cluster->migrar();

// no se olviden de agregar DBS antes de agregar personas,
// si agregan 3 dbs deberia antdar como antes
$cluster->guardar(new Persona("Pepe", 32));
$cluster->guardar(new Persona("Matias", 10));
$cluster->guardar(new Persona("Julian", 9));
$cluster->guardar(new Persona("Jose", 44));
$cluster->guardar(new Persona("Adrian", 55));
$cluster->guardar(new Persona("KP", 60));
$cluster->guardar(new Persona("Tomy", 70));

$cluster->mostarResumen();
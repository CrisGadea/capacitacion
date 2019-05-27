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

  public function dameNombre() { 
    return $this->nombre; 
  }
  public function dameDNI() { return $this->dni; }
}

class DB {
  private $data = array();

  public function insert($id, $obj) {
    $this->data[$id] = $obj;
  }

  public function delete($id) {
<<<<<<< HEAD
    unset($this->db[$id]);
  }

  public function get($id) {
    return $this->db[$id];
  }

  public function getAll() {
    return $this->db;
  }
}

class MongoDB
{
  private $server;
  private $db;
  private $collection;

  public function __construct()
  {
    $this->server = new MongoDB\Client("mongodb://172.17.0.3:27017");
    $this->db = $this->server->selectDatabase("globalhitss");
    $this->collection = $this->db->getCollection("mongoDB");
  }

  public function get($id){
    return $this->collection->findOne(['id'=>$id]);
  }

  public function getAll(){
    return $this->collection->find();
  }

  public function insert($id,$persona){
    $this->collection->insertOne(
      [
        'id'=>$id,
        'persona'=>$persona
      ]
    );
  }

  public function update($id,$elementos){
    if ($this->collection->findOne(['id'=>$id])) {
      $this->collection->findOne(['id'=>$id])->update(
        [
          'persona'=>$elementos
        ]
      );
      return true;
    }
    return false;
=======
    // borrar la key $id de data
  }

  public function get($id) {
    // devolver data[$id]
  }

  public function getAll() {
    // devolver data
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5
  }

  public function delete($id){
    if ($this->collection->findOne(['id'=>$id])) {
      $this->collection->findOne(['id'=>$id])->deleteOne();
      return true;
    }
    return false;
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
<<<<<<< HEAD
    $this->dbs[$a_donde]->insert($persona->dameDNI(), $persona);
=======
    $this->dbs[$a_donde][$persona->dameDNI()] = $persona;
    // no va mas con arreglos, ahora son DB
    // dbs[donde]->insert(id, usuario)
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5
  }

  public function borrar(Persona $persona) {
    $a_donde = $persona->dameDNI() % count($this->dbs);
<<<<<<< HEAD
    $this->dbs[$a_donde]->delete($persona->dameDNI());
  }

  public function agregarDB(MongoDB $db) {
=======
    unset($this->dbs[$a_donde][$persona->dameDNI()]);
    // aca no va mas el unset deberia ser
    // dbs[donde]->delete( id )
  }

  public function agregarDB(DB $db) {
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5
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

<<<<<<< HEAD
      $this->dbs[$viejoLugar]->delete($usuario->dameDNI());
      $this->dbs[$nuevoLugar]->insert($usuario->dameDNI(),$usuario);
=======
      // esto ya no van, deberian ser
      // db->delete
      // db->insert
      unset($this->dbs[$viejoLugar][$usuario->dameDNI()]);
      $this->dbs[$nuevoLugar][$usuario->dameDNI()] = $usuario;
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5
    }
  }

  public function mostarResumen() {
    foreach ($this->dbs as $dbKey => $db) {
<<<<<<< HEAD
      echo "DB: $dbKey - Cantidad: ".count($db->getAll())."\n";
=======
      echo "DB: $dbKey - Cantidad: ".count($db)."\n";
      //echo "DB: $dbKey - Cantidad: ".count($db->getall())."\n";
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5
    }
  }
}


<<<<<<< HEAD
$db = new Cluster(new Cola());
$db1=new MongoDB;
$db->agregarDB($db1);
$db->migrar();
$db2=new MongoDB;
$db->agregarDB($db2);
$db->migrar();
$db3=new MongoDB;
$db->agregarDB($db3);
$db->migrar();


$db->guardar(new Persona("Pepe", 32));
$db->guardar(new Persona("Matias", 10));
$db->guardar(new Persona("Julian", 9));
$db->guardar(new Persona("Jose", 44));
$db->guardar(new Persona("Adrian", 55));
$db->guardar(new Persona("KP", 60));
$db->guardar(new Persona("Tomy", 70));

$db4=new MongoDB;
$db->agregarDB($db4);
$db->migrar();
$db->mostarResumen();
=======
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
>>>>>>> b8efdd22469202a37844e6dc5eeef8fdf05398b5

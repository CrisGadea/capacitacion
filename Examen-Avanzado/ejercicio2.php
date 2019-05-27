<?php

/**
 * Este ejercicio es parte de CQRS. La idea siempre es tener separados
 * los metodos y funciones que leen o consultan información de aquellos
 * que guardan o modifican estados. Para ello debemos mantener esta
 * separación en la siguiente clase.
 * 
 * Esta DB sera reemplaza en produccion por una DB tipo mysql por lo cual
 * necesitamos tener separados las lecturas de las escrituras en la DB.
 */

class DB {
    private $data = array();

    public function search($key) {
      $out = array();
      foreach ($this->data as $data) {
        if ($data['key'] == $key) {
          $out[] = $data['value'];
        }
      }
      return $out;
    }

    public function save($key, $value) {
      $this->data[] = array('key'=> $key, 'value'=> $value);
      return True;
    }
}

class CuentaBancaria {
    private $db;
    private $dni;

    public function __construct(DB $db, $dni) {
      $this->db = $db;
      $this->dni = $dni;
    }

    public function traerTodasLasTransacciones() {
      return $this->db->search($this->dni);
    }

    public function agregarFondos($pesos) {
      return $this->db->save($this->dni, array('tipo'=>'fondos', 'total' => $pesos));
    }

    public function crearPlazoFijo($pesos) {
      // para crearlo necesitamos verificar si tiene fondos
      $fondos = $this->traerTodasLasTransacciones();
      $balance = 0;
      foreach($fondos as $fondo) {
        if ($fondo['tipo'] == 'fondos') {
          $balance += $fondo['total'];
        }
      }

      if ($balance < $pesos) {
        // no tiene plata suficiente para crear el plazo fijo
        return false;
      }

      //si tiene plaza suficiente para crear el plazo fijo
      // entonces restamos esa plata y agregamos un plazo fijo
      $this->db->save($this->dni, array('tipo'=>'plazo', 'total' => $pesos));
      //ahora resto los fondos que usamos para el plazo fijo
      $this->db->save($this->dni, array('tipo'=>'fondos', 'total' => (-1) * $pesos));

      return true;
    }

    public function comprarAcciones($accion, $pesos) {
      // para crearlo necesitamos verificar si tiene fondos
      $fondos = $this->traerTodasLasTransacciones();
      $balance = 0;
      foreach($fondos as $fondo) {
        if ($fondo['tipo'] == 'fondos') {
          $balance += $fondo['total'];
        }
      }

      if ($balance < $pesos) {
        // no tiene plata suficiente para crear el plazo fijo
        return false;
      }

      //si tiene plaza suficiente para crear el plazo fijo
      // entonces restamos esa plata y agregamos un plazo fijo
      $this->db->save($this->dni, array('tipo'=>'accion', 'accion' => $accion, 'total' => $pesos));
      //ahora resto los fondos que usamos para el plazo fijo
      $this->db->save($this->dni, array('tipo'=>'fondos', 'total' => (-1) * $pesos));

      return true;
    }
}
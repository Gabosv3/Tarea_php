<?php

class Autor {
    private $nombre; // Atributo para almacenar el nombre del autor
    private $biografia; // Atributo para almacenar la biografía del autor


    // Constructor de la clase Autor
    public function __construct($nombre, $biografia) {
        $this->nombre = $nombre;
        $this->biografia = $biografia;
    }

    // Getters para acceder a los atributos del autor
    public function getNombre() {
        return $this->nombre;
    }

    public function getBiografia() {
        return $this->biografia;
    }
}
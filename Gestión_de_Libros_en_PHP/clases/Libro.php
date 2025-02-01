<?php

class Libro {
    private $titulo;// Nombre del libro
    private $autor;// Nombre del autor
    private $categoria;// Nombre de la categoría
    private $estado; // 'disponible' o 'prestado'

    // Constructor de la clase Libro
    public function __construct($titulo, $autor, $categoria) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->estado = 'disponible';
    }

    // Getters para acceder a los atributos
    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getEstado() {
        return $this->estado;
    }

    // Métodos para prestar y devolver el libro
    public function prestar() {
        if ($this->estado == 'disponible') {
            $this->estado = 'prestado';
            return true;
        }
        return false;
    }

    public function devolver() {
        if ($this->estado == 'prestado') {
            $this->estado = 'disponible';
            return true;
        }
        return false;
    }
}
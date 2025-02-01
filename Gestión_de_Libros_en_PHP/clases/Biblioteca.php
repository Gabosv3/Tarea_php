<?php

class Biblioteca {
    private $libros = [];
    private $autores = [];
    private $categorias = [];

    public function agregarLibro($libro) {
        $this->libros[] = $libro;
    }

    public function buscarLibro($titulo) {
        foreach ($this->libros as $libro) {
            if ($libro->getTitulo() == $titulo) {
                return $libro;
            }
        }
        return null;
    }

    public function prestarLibro($titulo) {
        $libro = $this->buscarLibro($titulo);
        if ($libro && $libro->prestar()) {
            return "Libro prestado con éxito.";
        }
        return "El libro no está disponible.";
    }

    public function devolverLibro($titulo) {
        $libro = $this->buscarLibro($titulo);
        if ($libro && $libro->devolver()) {
            return "Libro devuelto con éxito.";
        }
        return "El libro no estaba prestado.";
    }

    public function agregarAutor($autor) {
        $this->autores[] = $autor;
    }

    public function agregarCategoria($categoria) {
        $this->categorias[] = $categoria;
    }
}
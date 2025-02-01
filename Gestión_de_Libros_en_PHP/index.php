<?php

// Incluir las clases
require_once 'clases/Autor.php';
require_once 'clases/Categoria.php';
require_once 'clases/Libro.php';
require_once 'clases/Biblioteca.php';

// Crear autores
$autor1 = new Autor("Gabriel García Márquez", "Escritor colombiano, premio Nobel de Literatura.");
$autor2 = new Autor("J.K. Rowling", "Escritora británica, autora de la serie Harry Potter.");

// Crear categorías
$categoria1 = new Categoria("Realismo mágico");
$categoria2 = new Categoria("Fantasía");

// Crear libros
$libro1 = new Libro("Cien años de soledad", $autor1, $categoria1);
$libro2 = new Libro("Harry Potter y la piedra filosofal", $autor2, $categoria2);

// Crear biblioteca y agregar libros
$biblioteca = new Biblioteca();
$biblioteca->agregarLibro($libro1);
$biblioteca->agregarLibro($libro2);

// Prestar un libro
echo $biblioteca->prestarLibro("Cien años de soledad") . "\n";

// Devolver un libro
echo $biblioteca->devolverLibro("Cien años de soledad") . "\n";

// Buscar un libro
$libroEncontrado = $biblioteca->buscarLibro("Harry Potter y la piedra filosofal");
if ($libroEncontrado) {
    echo "Libro encontrado: " . $libroEncontrado->getTitulo() . "\n";
} else {
    echo "Libro no encontrado.\n";
}
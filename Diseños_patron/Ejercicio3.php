<?php
// Interfaz para los personajes
interface Personaje {
    public function getDescripcion();
}

// Clase base para personajes
class Guerrero implements Personaje {
    public function getDescripcion() {
        return "Guerrero";
    }
}

class Mago implements Personaje {
    public function getDescripcion() {
        return "Mago";
    }
}

// Decorador base para armas
abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    abstract public function getDescripcion();
}

// Decorador para espada
class Espada extends ArmaDecorator {
    public function getDescripcion() {
        return $this->personaje->getDescripcion() . " con Espada";
    }
}

// Decorador para arco
class Arco extends ArmaDecorator {
    public function getDescripcion() {
        return $this->personaje->getDescripcion() . " con Arco";
    }
}

// Uso del Decorator
$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);
echo $guerreroConEspada->getDescripcion(); // Guerrero con Espada

$mago = new Mago();
$magoConArco = new Arco($mago);
echo "\n" . $magoConArco->getDescripcion(); // Mago con Arco
?>
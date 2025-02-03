<?php
// Interfaz para los personajes
interface Personaje {
    public function atacar();
    public function getVelocidad();
}

// Clase Esqueleto
class Esqueleto implements Personaje {
    public function atacar() {
        return "Esqueleto ataca con un arco!";
    }

    public function getVelocidad() {
        return 5;
    }
}

// Clase Zombi
class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con sus manos!";
    }

    public function getVelocidad() {
        return 3;
    }
}

// Factory para crear personajes
class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel no válido");
        }
    }
}

// Uso del Factory
$personaje = PersonajeFactory::crearPersonaje('facil');
echo $personaje->atacar(); // Esqueleto ataca con un arco!
echo "\nVelocidad: " . $personaje->getVelocidad(); // Velocidad: 5
?>
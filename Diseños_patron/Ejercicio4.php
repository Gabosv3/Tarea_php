<?php
// Interfaz para las estrategias de salida
interface SalidaStrategy {
    public function mostrar($mensaje);
}

// Estrategia para salida por consola
class ConsolaSalida implements SalidaStrategy {
    public function mostrar($mensaje) {
        echo "Consola: $mensaje\n";
    }
}

// Estrategia para salida en JSON
class JsonSalida implements SalidaStrategy {
    public function mostrar($mensaje) {
        echo json_encode(['mensaje' => $mensaje]) . "\n";
    }
}

// Estrategia para salida en archivo TXT
class TxtSalida implements SalidaStrategy {
    public function mostrar($mensaje) {
        file_put_contents('salida.txt', "TXT: $mensaje\n", FILE_APPEND);
    }
}

// Contexto que utiliza una estrategia
class Mensaje {
    private $estrategia;

    public function __construct(SalidaStrategy $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(SalidaStrategy $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

// Uso del Strategy
$mensaje = new Mensaje(new ConsolaSalida());
$mensaje->mostrarMensaje("Hola Mundo"); // Consola: Hola Mundo

$mensaje->setEstrategia(new JsonSalida());
$mensaje->mostrarMensaje("Hola Mundo"); // {"mensaje":"Hola Mundo"}

$mensaje->setEstrategia(new TxtSalida());
$mensaje->mostrarMensaje("Hola Mundo"); // Escribe en salida.txt
?>
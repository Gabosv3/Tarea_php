<?php
// Interfaz para Windows 10
interface Windows10 {
    public function abrirArchivo($archivo);
}

// Clase para Windows 7
class Windows7 {
    public function abrirDoc($archivo) {
        return "Abriendo archivo de Word en Windows 7: $archivo";
    }

    public function abrirXls($archivo) {
        return "Abriendo archivo de Excel en Windows 7: $archivo";
    }

    public function abrirPpt($archivo) {
        return "Abriendo archivo de PowerPoint en Windows 7: $archivo";
    }
}

// Adapter para Windows 7 en Windows 10
class Windows7Adapter implements Windows10 {
    private $windows7;

    public function __construct(Windows7 $windows7) {
        $this->windows7 = $windows7;
    }

    public function abrirArchivo($archivo) {
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        switch ($extension) {
            case 'doc':
                return $this->windows7->abrirDoc($archivo);
            case 'xls':
                return $this->windows7->abrirXls($archivo);
            case 'ppt':
                return $this->windows7->abrirPpt($archivo);
            default:
                throw new Exception("Formato no compatible");
        }
    }
}

// Uso del Adapter
$windows7 = new Windows7();
$adapter = new Windows7Adapter($windows7);
echo $adapter->abrirArchivo('documento.doc'); // Abriendo archivo de Word en Windows 7: documento.doc
?>
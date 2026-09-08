<?php
class Estudiante {
    private $nombre;
    private $edad;
    private $carrera;

    public function __construct($nombre, $edad, $carrera) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
    }

    public function mostrarInformacion() {
        return "Estudiante: {$this->nombre}<br>Edad: {$this->edad} años<br>Carrera: {$this->carrera}";
    }
}
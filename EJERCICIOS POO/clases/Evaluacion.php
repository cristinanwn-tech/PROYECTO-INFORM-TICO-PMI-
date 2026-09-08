<?php
class Evaluacion {
    private $nombre;
    private $nota1;
    private $nota2;
    private $nota3;

    public function __construct($nombre, $nota1, $nota2, $nota3) {
        $this->nombre = $nombre;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
    }

    public function getNombre() { return $this->nombre; }

    public function calcularPromedio() {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function obtenerEstado() {
        return $this->calcularPromedio() >= 13 ? 'APROBADO' : 'DESAPROBADO';
    }
}
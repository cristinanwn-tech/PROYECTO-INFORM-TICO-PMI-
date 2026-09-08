<?php
class Vehiculo {
    private $marca;
    private $modelo;
    private $anio;
    private $precio;

    public function __construct($marca, $modelo, $anio, $precio) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        $this->precio = $precio;
    }

    public function calcularDescuento() {
        return $this->precio > 50000 ? $this->precio * 0.10 : $this->precio * 0.05;
    }

    public function calcularPrecioFinal() {
        return $this->precio - $this->calcularDescuento();
    }

    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getAnio() { return $this->anio; }
    public function getPrecio() { return $this->precio; }
}
<?php
class Producto {
    private $nombre;
    private $precioUnitario;
    private $cantidad;

    public function __construct($nombre, $precioUnitario, $cantidad) {
        $this->nombre = $nombre;
        $this->precioUnitario = $precioUnitario;
        $this->cantidad = $cantidad;
    }

    public function getNombre() { return $this->nombre; }
    public function getPrecioUnitario() { return $this->precioUnitario; }
    public function getCantidad() { return $this->cantidad; }

    public function calcularTotal() {
        return $this->precioUnitario * $this->cantidad;
    }
}
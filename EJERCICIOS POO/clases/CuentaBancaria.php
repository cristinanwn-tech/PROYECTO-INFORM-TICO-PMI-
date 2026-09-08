<?php
class CuentaBancaria {
    private $titular;
    private $saldo;

    public function __construct($titular, $saldoInicial) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function depositar($monto) {
        if ($monto > 0) {
            $this->saldo += $monto;
            return "Depósito exitoso de S/ {$monto}";
        }
        return "Monto de depósito no válido";
    }

    public function retirar($monto) {
        if ($monto <= $this->saldo) {
            $this->saldo -= $monto;
            return "Retiro exitoso de S/ {$monto}";
        }
        return "Intento de retiro por S/ {$monto} rechazada: Fondos insuficientes";
    }

    public function consultarSaldo() {
        return $this->saldo;
    }

    public function getTitular() { return $this->titular; }
}
<?php
// Carga de Clases
require_once 'Clases/Estudiante.php';
require_once 'Clases/Producto.php';
require_once 'Clases/Evaluacion.php';
require_once 'Clases/CuentaBancaria.php';
require_once 'Clases/Vehiculo.php';

// --- Instancias Ejercicio 1 ---
$estudiante1 = new Estudiante('Ana Torres', 20, 'Desarrollo de Sistemas');
$estudiante2 = new Estudiante('Carlos Mendoza', 22, 'Ciberseguridad');

// --- Instancias Ejercicio 2 ---
$productos = [
    new Producto('Mouse inalámbrico', 65.00, 3),
    new Producto('Teclado Mecánico', 120.00, 2)
];

// --- Instancias Ejercicio 3 ---
$evaluaciones = [
    new Evaluacion('Juan Pérez', 14, 15, 13),
    new Evaluacion('Maria Gómez', 10, 11, 9)
];

// --- Instancias Ejercicio 4 ---
$cuenta = new CuentaBancaria('Luis Ramírez', 500.00);
$movimientos = [];
$movimientos[] = $cuenta->depositar(200.00);
$movimientos[] = $cuenta->retirar(300.00);
$movimientos[] = $cuenta->retirar(500.00); // Supera el saldo disponible

// --- Instancias Ejercicio 5 ---
$vehiculos = [
    new Vehiculo('Toyota', 'RAV4', 2023, 60000.00),
    new Vehiculo('Nissan', 'Versa', 2022, 45000.00),
    new Vehiculo('Hyundai', 'Tucson', 2024, 55000.00)
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica POO PHP</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Resolución de Práctica POO</h1>
        <p class="subtitulo">Programación Orientada a Objetos en PHP</p>

        <!-- EJERCICIO 1 -->
        <section class="panel">
            <h2>Ejercicio 1: Registro de Estudiante</h2>
            <div class="campo">
                <p><?= $estudiante1->mostrarInformacion() ?></p>
            </div>
            <hr style="border: 0; border-top: 1px solid #ddd; margin: 10px 0;">
            <div class="campo">
                <p><?= $estudiante2->mostrarInformacion() ?></p>
            </div>
        </section>

        <!-- EJERCICIO 2 -->
        <section class="panel">
            <h2>Ejercicio 2: Producto y Cálculo de Venta</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $p): ?>
                    <tr>
                        <td><?= $p->getNombre() ?></td>
                        <td>S/ <?= number_format($p->getPrecioUnitario(), 2) ?></td>
                        <td><?= $p->getCantidad() ?></td>
                        <td>S/ <?= number_format($p->calcularTotal(), 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- EJERCICIO 3 -->
        <section class="panel">
            <h2>Ejercicio 3: Evaluación de Estudiante</h2>
            <table>
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Promedio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluaciones as $e): ?>
                    <tr>
                        <td><?= $e->getNombre() ?></td>
                        <td><?= number_format($e->calcularPromedio(), 2) ?></td>
                        <td><strong><?= $e->obtenerEstado() ?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- EJERCICIO 4 -->
        <section class="panel">
            <h2>Ejercicio 4: Cuenta Bancaria (Encapsulamiento)</h2>
            <p><strong>Titular:</strong> <?= $cuenta->getTitular() ?></p>
            <br>
            <p><strong>Historial de Operaciones:</strong></p>
            <ul>
                <?php foreach ($movimientos as $mov): ?>
                    <li><?= $mov ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="resumen">
                <h2>Saldo Final: S/ <?= number_format($cuenta->consultarSaldo(), 2) ?></h2>
            </div>
        </section>

        <!-- EJERCICIO 5 -->
        <section class="panel">
            <h2>Ejercicio 5: Sistema de Vehículos (Reto Integrador)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio Original</th>
                        <th>Descuento</th>
                        <th>Precio Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculos as $v): ?>
                    <tr>
                        <td><?= $v->getMarca() ?></td>
                        <td><?= $v->getModelo() ?></td>
                        <td><?= $v->getAnio() ?></td>
                        <td>S/ <?= number_format($v->getPrecio(), 2) ?></td>
                        <td>S/ <?= number_format($v->calcularDescuento(), 2) ?></td>
                        <td><strong>S/ <?= number_format($v->calcularPrecioFinal(), 2) ?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </div>
</body>
<link rel="stylesheet" href="css/estilos.css">
</html>
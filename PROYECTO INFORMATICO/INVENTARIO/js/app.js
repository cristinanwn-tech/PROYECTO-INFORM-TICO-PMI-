// Array para almacenar los productos
let productos = [];

// Captura de elementos del DOM
const form = document.getElementById('form-producto');
const inputNombre = document.getElementById('nombre');
const selectCategoria = document.getElementById('categoria');
const inputPrecio = document.getElementById('precio');
const inputStock = document.getElementById('stock');
const tabla = document.getElementById('tabla-productos');
const inputBuscar = document.getElementById('buscar');
const spanTotalProductos = document.getElementById('total-productos');
const spanValorTotal = document.getElementById('valor-total');

// Cargar LocalStorage al iniciar
document.addEventListener('DOMContentLoaded', () => {
    const datosGuardados = localStorage.getItem('productos');
    if (datosGuardados) {
        productos = JSON.parse(datosGuardados);
    }
    mostrarProductos(productos);
    calcularTotales();
});

// Evento enviar formulario
form.addEventListener('submit', (e) => {
    e.preventDefault();
    agregarProducto();
});

// Evento buscar por nombre mientras se escribe
inputBuscar.addEventListener('input', () => {
    buscarProductos();
});

// 1 y 2. Registrar y Validar Producto
function agregarProducto() {
    const nombre = inputNombre.value.trim();
    const categoria = selectCategoria.value;
    const precio = parseFloat(inputPrecio.value);
    const stock = parseInt(inputStock.value);

    // Validaciones estrictas
    if (nombre === '') {
        alert('El nombre es obligatorio.');
        return;
    }
    if (isNaN(precio) || precio <= 0) {
        alert('El precio debe ser mayor que 0.');
        return;
    }
    if (isNaN(stock) || stock < 0) {
        alert('El stock no puede ser negativo.');
        return;
    }

    // 3. Determinar estado automáticamente
    const estado = stock > 0 ? 'Disponible' : 'Agotado';

    // Objeto producto
    const nuevoProducto = {
        id: Date.now(),
        nombre,
        categoria,
        precio,
        stock,
        estado
    };

    productos.push(nuevoProducto);
    guardarLocalStorage();
    mostrarProductos(productos);
    calcularTotales();

    form.reset();
}

// 7. Manipulación del DOM: Mostrar Productos en la Tabla
function mostrarProductos(lista) {
    tabla.innerHTML = '';

    lista.forEach((prod) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${prod.nombre}</td>
            <td>${prod.categoria}</td>
            <td>${prod.precio.toFixed(2)}</td>
            <td>${prod.stock}</td>
            <td>${prod.estado}</td>
            <td><button class="btn-eliminar" onclick="eliminarProducto(${prod.id})">Eliminar</button></td>
        `;

        tabla.appendChild(fila);
    });
}

// 4. Eliminar producto
function eliminarProducto(id) {
    productos = productos.filter(prod => prod.id !== id);
    guardarLocalStorage();
    mostrarProductos(productos);
    calcularTotales();
}

// 5. Buscar productos por nombre
function buscarProductos() {
    const texto = inputBuscar.value.toLowerCase();
    const filtrados = productos.filter(prod => prod.nombre.toLowerCase().includes(texto));
    mostrarProductos(filtrados);
}

// 6 y 7. Calcular totales
function calcularTotales() {
    spanTotalProductos.textContent = productos.length;

    const valorTotal = productos.reduce((acc, prod) => acc + (prod.precio * prod.stock), 0);
    spanValorTotal.textContent = valorTotal.toFixed(2);
}

// 8. Desafío adicional: LocalStorage
function guardarLocalStorage() {
    localStorage.setItem('productos', JSON.stringify(productos));
}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Productos - API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-primary">Gestión de Productos</h1>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Agregar Nuevo Producto</div>
            <div class="card-body">
                <form id="productoForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" id="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" id="precio" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" id="stock" class="form-control" required>
                        </div>
                        <div class="col-md-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">Lista de Productos</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <!-- NUEVO: Columna para los botones de acción -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaProductos"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        async function cargarProductos() {
            try {
                const response = await fetch('/api/productos');
                const productos = await response.json();
                const tabla = document.getElementById('tablaProductos');
                tabla.innerHTML = '';

                productos.forEach(producto => {
                    tabla.innerHTML += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td>${producto.descripcion || 'N/A'}</td>
                            <td>$${producto.precio}</td>
                            <td>${producto.stock}</td>
                            <!-- NUEVO: Botones para actualizar y eliminar -->
                            <td>
                                <button onclick="editarProducto(${producto.id})" class="btn btn-sm btn-warning">Editar</button>
                                <button onclick="eliminarProducto(${producto.id})" class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
            } catch (error) {
                console.error('Error al cargar:', error);
            }
        }

        document.getElementById('productoForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const nuevoProducto = {
                nombre: document.getElementById('nombre').value,
                descripcion: document.getElementById('descripcion').value,
                precio: parseFloat(document.getElementById('precio').value),
                stock: parseInt(document.getElementById('stock').value)
            };

            try {
                const response = await fetch('/api/productos', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                    body: JSON.stringify(nuevoProducto)
                });

                if (response.ok) {
                    this.reset();
                    cargarProductos();
                } else {
                    alert('Error al guardar.');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // NUEVO: Función para Eliminar un producto (DELETE)
        async function eliminarProducto(id) {
            if (!confirm('¿Estás seguro de que deseas eliminar este producto?')) return;

            try {
                const response = await fetch(`/api/productos/${id}`, {
                    method: 'DELETE',
                    headers: { 'Accept': 'application/json' }
                });

                if (response.ok) {
                    cargarProductos(); // Recargar la tabla
                } else {
                    alert('Error al eliminar.');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // NUEVO: Función para Editar un producto (PUT)
        async function editarProducto(id) {
            // Pedimos los nuevos datos mediante ventanas emergentes (prompts)
            const nuevoPrecio = prompt("Ingresa el nuevo precio:");
            const nuevoStock = prompt("Ingresa el nuevo stock:");

            // Si el usuario cancela, no hacemos nada
            if (nuevoPrecio === null || nuevoStock === null) return;

            try {
                const response = await fetch(`/api/productos/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        precio: parseFloat(nuevoPrecio),
                        stock: parseInt(nuevoStock)
                    })
                });

                if (response.ok) {
                    cargarProductos(); // Recargar la tabla
                } else {
                    alert('Error al actualizar. Verifica los datos.');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        cargarProductos();
    </script>
</body>
</html>
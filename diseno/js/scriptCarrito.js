// Variables globales del carrito
var carrito = [];
var totalCarrito = 0;

function mostrarCarritoEnTextarea() {
  var carritoi = document.getElementById('carritoi');

  // Limpiar el contenido anterior del <textarea>
  carritoi.value = '';

  // Recorrer los productos en el carrito y agregarlos al <textarea>
  carrito.forEach(function(item) {
    var linea = item.titulo + ' - Cantidad: ' + item.cantidad + ' - Subtotal: $' + (item.precio * item.cantidad).toFixed(2);
    carritoi.value += linea + '\n';
  });

  // Actualizar el total del carrito
  carritoi.value += 'Total: $' + totalCarrito.toFixed(2);
}

// Función para agregar un producto al carrito
function agregarAlCarrito(ref, titulo, precio) {
  var cantidad = document.getElementById('cantidadAComprar' + ref).value;

  // Verificar si el producto ya está en el carrito
  var index = carrito.findIndex(function(item) {
    return item.ref === ref;
  });

  if (index !== -1) {
    // Si el producto ya existe, se actualiza la cantidad
    carrito[index].cantidad += parseInt(cantidad);
  } else {
    // Si el producto no existe, se agrega al carrito
    carrito.push({
      ref: ref,
      titulo: titulo,
      precio: parseFloat(precio),
      cantidad: parseInt(cantidad)
    });
  }

  // Actualizar el total del carrito
  totalCarrito += parseFloat(precio) * parseInt(cantidad);

  // Actualizar la visualización del carrito
  actualizarCarrito();

  // Guardar el carrito en localStorage
  localStorage.setItem('carrito', JSON.stringify(carrito));
  localStorage.setItem('totalCarrito', totalCarrito.toString());
}

// Función para actualizar la visualización del carrito
function actualizarCarrito() {
  var carritoLista = document.getElementById('carrito-lista');
  var carritoTotal = document.getElementById('carrito-total');
  var totalAPagarElement = document.getElementById('TotalAPagar');

  // Limpiar la lista del carrito
  carritoLista.innerHTML = '';

  // Recorrer los productos en el carrito y agregarlos a la lista
  carrito.forEach(function(item) {
    var li = document.createElement('li');
    li.textContent = item.titulo + ' - Cantidad: ' + item.cantidad + ' - Subtotal: $' + (item.precio * item.cantidad).toFixed(2);
    carritoLista.appendChild(li);
  });

  // Actualizar el total del carrito
  carritoTotal.textContent = '$' + totalCarrito.toFixed(2);
  totalAPagarElement.textContent = '$' + totalCarrito.toFixed(2);

  // Mostrar el carrito en el textarea
  mostrarCarritoEnTextarea();
}

// Función para vaciar el carrito
function vaciarCarrito() {
  carrito = [];
  totalCarrito = 0;

  // Actualizar la visualización del carrito
  actualizarCarrito();

  // Limpiar los datos del carrito en localStorage
  localStorage.removeItem('carrito');
  localStorage.removeItem('totalCarrito');
}

// Función para cargar el carrito almacenado en localStorage
function cargarCarrito() {
  var carritoGuardado = localStorage.getItem('carrito');
  var totalCarritoGuardado = localStorage.getItem('totalCarrito');

  if (carritoGuardado && totalCarritoGuardado) {
    carrito = JSON.parse(carritoGuardado);
    totalCarrito = parseFloat(totalCarritoGuardado);

    // Actualizar la visualización del carrito
    actualizarCarrito();
  }
}

// Llamar a la función cargarCarrito al cargar la página
window.addEventListener('load', cargarCarrito);

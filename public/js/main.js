// JavaScript de la tienda.
// Solo se usa para mejorar la pagina: si se desactiva, todo sigue funcionando.

// 1. Pedir confirmacion antes de vaciar el carrito o desactivar algo.
const enlacesPeligrosos = document.querySelectorAll("[data-confirmar]");

enlacesPeligrosos.forEach(function (enlace) {
  enlace.addEventListener("click", function (evento) {
    if (!confirm(enlace.dataset.confirmar)) {
      evento.preventDefault(); // cancela la navegacion
    }
  });
});

// 2. Evitar que un doble clic cree dos pedidos.
const formularioPedido = document.getElementById("form-pedido");

if (formularioPedido) {
  formularioPedido.addEventListener("submit", function () {
    const boton = document.getElementById("boton-confirmar");
    boton.disabled = true;
    boton.textContent = "Procesando...";
  });
}

// 3. Filtrar las zapatillas del catalogo por nombre.
const buscador = document.getElementById("buscador");
const tarjetas = document.querySelectorAll(".producto");

if (buscador) {
  buscador.addEventListener("input", function () {
    const texto = buscador.value.toLowerCase();
    let visibles = 0;

    tarjetas.forEach(function (tarjeta) {
      const nombre = tarjeta.querySelector("h3").textContent.toLowerCase();

      if (nombre.indexOf(texto) !== -1) {
        tarjeta.style.display = ""; // vuelve al display que pone el CSS
        visibles++;
      } else {
        tarjeta.style.display = "none";
      }
    });

    document.getElementById("sin-resultados").hidden = visibles > 0;
  });
}

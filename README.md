# TP3 - Trabajo Práctico N° 3

El Trabajo Práctico N° 3 es la última parte del trabajo integrador que se debe presentar en la instancia final del curso. El objetivo principal del trabajo integrador es desarrollar un carrito de compras donde los usuarios puedan registrarse, iniciar sesión, agregar productos al carrito, ver los productos seleccionados y simular una compra (sin plataforma de pago real).

## Web

### Vistas Principales

Las vistas de inicio y la vista individual de la entidad se mantienen como en la primera parte del trabajo práctico. Se debe agregar un listado de todas las categorías en algún lugar visible de la página de inicio (en el navbar, el contenido principal, el footer, etc.). Por ejemplo, si el proyecto está centrado en canciones, en la página de inicio deben mostrarse géneros musicales como "Pop", "Rock", "Disco", etc.

### Nuevas Vistas

1. **Vista de Categoría**: Al hacer clic en alguno de los enlaces del listado de categorías en la página de inicio, el usuario deberá ser dirigido a esta vista. Aquí se mostrará un listado de la entidad principal filtrada por esa categoría específica. Por ejemplo, si el proyecto trata sobre películas y se hace clic en "Acción", se debe mostrar solo las películas de acción. La URL de esta vista debe seguir el formato: `http://localhost/categories/1`, donde "categories" puede ser el nombre de la tabla de categorías según el proyecto y "1" es el ID de la categoría seleccionada.

2. **Vista de Checkout**: Esta vista mostrará un listado de productos que el usuario tiene en su carrito de compras. Si no hay productos en el carrito, se mostrará un mensaje indicando que aún no hay productos seleccionados. Debajo del listado de productos, debe haber un botón "Comprar" que simulará la acción de compra.

### Acciones

Las acciones principales que puede realizar un usuario en la web son:

- **Agregar al Carrito**: Al hacer clic en el botón "Agregar al Carrito" en la vista individual de un producto, se realizará una solicitud POST a la URL `http://localhost/cart/add`, enviando el ID del producto como parámetro. El controlador correspondiente deberá agregar el producto al carrito de compras (almacenado en la sesión) y redirigir al usuario a la vista de checkout.

- **Comprar**: Esta acción se ejecuta al hacer clic en el botón "Comprar" en la vista de checkout. Envia una solicitud POST a `http://localhost/cart/buy` para eliminar todos los productos del carrito de compras (almacenados en la sesión). Luego, puede redirigir al usuario de vuelta al inicio o a una vista especial de confirmación de compra.

## Backoffice

El backoffice se mantiene igual que en la primera entrega y se agregan las siguientes funcionalidades:

- **Formulario de Edición/Creación**: Se agrega un select en el formulario para cargar o editar la entidad principal. Este select contendrá todas las categorías disponibles para que el administrador elija la categoría correspondiente para la entidad. Por ejemplo, si se están gestionando películas, el formulario debe incluir un select con géneros como "Acción", "Aventura", "Comedia", etc. Además, se deben establecer relaciones de muchos a uno (belongsTo) desde el modelo principal hacia el modelo de categoría, y de uno a muchos (hasMany) desde el modelo de categoría hacia el modelo principal. El controlador correspondiente debe vincular la entidad principal con la categoría seleccionada al guardar o editar.

- **Listado de Entidades**: La vista que muestra la tabla con el listado de entidades debe incluir paginación para una mejor experiencia de usuario.

## Autenticación

Es necesario implementar un sistema de autenticación para usuarios y administradores:

- **Usuario**: Los usuarios pueden registrarse y iniciar sesión. La única vista a la que un usuario no autenticado no puede acceder es la vista de checkout. Además, la acción de agregar productos al carrito de compras debe estar protegida.

- **Administrador**: Los administradores solo pueden iniciar sesión. Todas las vistas y acciones que ejecuta el administrador deben estar protegidas.

## Extra

- **Persistencia de la Compra**: Se debe agregar la lógica necesaria para guardar la compra en la base de datos al realizar la acción de checkout. Esto implica agregar los modelos `Item` y `Sale`, las migraciones correspondientes y establecer las relaciones adecuadas (una Sale tiene muchos Items).

## Consideraciones Generales

Para la implementación del TP se debe utilizar Laravel, haciendo uso de características como migraciones, modelos, controladores, vistas Blade, relaciones `belongsTo` y `hasMany`, sesiones, autenticación y paginación. El diseño visual puede hacer uso de plantillas preexistentes, pero las cuestiones estéticas no afectarán la nota, siempre y cuando no afecten la experiencia de usuario.

¡Éxitos en tu implementación!

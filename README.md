TP3

El trabajo práctico N° 3 es la última parte del trabajo integrador que se debe presentar en la
instancia final.
El objetivo del trabajo integrador es realizar un carrito de compras en donde un usuario
pueda registrarse, iniciar sesión, agregar productos en un carrito de compras, ver los
productos seleccionados y simular una compra (sin plataforma de pago).
A continuación se detallan los objetivos del presente trabajo práctico.
Web

Las vistas de home y la vista individual de la entidad se mantienen igual que en la primera
parte del trabajo práctico.
Se debe agregar en algún lugar visible de la home (en el nav, en el contenido principal, en
el footer, etc) un listado de todas categorías.
Por ejemplo, si se eligió una temática de canciones, en la home se tienen que poder ver un
listado de los géneros de las canciones (pop, rock, disco, etc).
En la web se agregan dos nuevas vistas.

Vista de la categoría
Esta es la vista que se muestra al hacer click en alguno de los links del listado de categorías
que están en la home (tal cual se detalla más arriba).
Al hacer click sobre alguna de las categorías agregadas en la home debemos navegar a
esta vista en donde se muestre un listado de la entidad principal filtrada por esa
categoría.
Por ejemplo si nuestro proyecto trata sobre películas y hacemos click en el link de “acción”
debemos navegar a una vista en donde sólo se muestren las películas de acción.
La url de esta vista debe tener el siguiente formato:
http://localhost/categories/1
En donde categories puede ser el nombre nuestra tabla de categories. Es decir, que según
el proyecto que estemos haciendo ese texto podría ser: categories, genres, civs, etc.

Lo siguiente en la URL es el número de id de la categoría que se quiere visualizar.

Vista de checkout
En esta vista se debe mostrar o bien una tabla con el listado de productos que el usuario
tiene en su “changuito” o bien una leyenda de “Aún no tenés productos en tu changuito”.
Esta es la vista que el usuario va a llegar luego de hacer click en el botón “Agregar al
carrito” que está en la vista individual del producto (esto viene del TP2).
En la vista de checkout abajo del listado de productos agregados al carrito hay que agregar
un botón que diga “comprar” que va a similar la acción de compra. Esta es una de las
dos acciones que hace falta agregar en el TP (ver apartado de acciones más abajo).
Acciones
La web a la que accede el usuario va a contar con dos acciones principales.
Agregar al carrito
Esta acción se ejecuta cuando el usuario hace click en el botón “agregar al carrito” que está
en la vista individual de la entidad. Al hacer click en el botón se debe hacer un request
mediante POST, por tanto va a ser necesario que el botón se encuentre dentro de un form.
La URL a la que va a dirigirse (el method del form) va a tener una estructura similar a esta:
http://localhost/cart/add
El parámetro que se va enviar va a ser el id del producto que se quiera agregar. Para
eso va a hacer falta contar con un input hidden con dicho parámetro.

<input type="hidden" name="id" value="1">

El método del controlador que resuelva esta acción debe agregar el id producto a la
session si aún no está agregado o no hacer nada si ya lo está.
Luego de hacer dicha operación debe redirigir a la vista de checkout.

Comprar
Es la acción que se dispara al hacer click en el botón comprar de la vista de checkout.
El botón envía un request por POST a una url similar a la siguiente;
http://localhost/card/buy
No es necesario enviar parámetros dado que el controlador que resuelva el request lo va a
hacer en función de los ids que están guardados en session.
El método del controlador que se encargue de resolver esta acciones simplemente tiene
que eliminar todos los productos que están guardados en session.
Finalmente puede redirigir o bien al home o hacer una vista especial con un mensaje de
“Gracias por tu compra”.

Backoffice

El backoffice se mantiene exactamente igual que en la primera entrega y se agregan las
siguientes funcionalidades.
Formulario de edición / creación
En el formulario para cargar o editar la entidad principal es necesario agregar un select con
el listado de categorías para que el administrador elija entre todas las categorías cual le va
a asignar a la entidad.
Por ejemplo si estamos cargando películas en el formulario tiene que aparecer un select con
todos los géneros (acción, aventura, comedia, etc).
También es necesario que haya una relación de muchos a uno (belongsTo) desde el model
principal hacia el modelo de categoría. Y a su vez debe existir una relación de uno a
muchos (hasMany) del model de categoría hacia el principal.
Finalmente, en el controller que guarda y edita la entidad principal hace falta vincular a la
entidad principal con la categoría seleccionada.

Listado de entidades
En la vista que muestra la tabla con el listado de entidades es necesario agregar
paginación.

Autenticación

Es necesario que haya un sistema de autenticación tanto para el usuario como para el
administrador.

Usuario
El usuario se va a poder registrar y loguear.
La única vista a la que el usuario no puede acceder sin estar logueado debe ser la vista de
checkout. A su vez también debe estar protegida la acción de agregar productos al carrito.

Administrador
El administrador sólo se puede loguear.
Todas las vistas y acciones que ejecuta el administrador deben estar protegidas.

Extra

Este apartado no resta nota si no está hecho o está mal aplicado, pero puede sumar si está
bien resuelto.
Persistencia de la compra
Agregar a la acción que se encarga del checkout el código necesario para guardar en la
base de datos la compra.

Para ello va a ser necesario también agregar los modelos Item y Sale, las migraciones
correspondientes a dichos modelos y las relaciones entre cada uno (una Sale hasMany
Item)

https://dbdiagram.io/d/654397cb7d8bbd64655a44a5

Consideraciones generales
Para la resolución del TP se debe utilizar Laravel.
Es necesario implementar las siguientes características del framework: migraciones,
modelos, controladores, vistas del tipo blade, relaciones belongsTo y hasMany, session,
auth y paginación.
Para realizar el diseño, tanto de la web como del backoffice, se puede utilizar un template.
Las cuestiones visuales o estéticas no afectan la nota en tanto la experiencia de usuario no
se vea afectada.
¡Éxitos!

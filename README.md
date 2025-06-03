# portafolio-crud

## Descripción
Portafolio construido a base de PHP con formato HTML integrado.

## Tecnologías utilizadas
- XAMPP
  - phpMyAdmin
  - MySQL
- Bootstrap 5.3

## Pasos para ejecutar el proyecto

### Localmente
1. Inicializar la base de datos.
   1. Abrir el panel de control de XAMPP.
   2. Iniciar servicio de Apache y MySQL.
   3. Abrir panel de control phpMyAdmin
   4. Crear base de datos 'portafolio_db' utilizando archivo '~/sql/portafolio.sql'
2. Ingresar direccion URL en barra de enlace. (localhost/portafolio_crud)
3. Ingresar credenciales en página login.
   - Usuario: admin
   - Contraseña: 123456
4. En index.php, pulsar botón 'Agregar proyecto' si se desea.
   1. Ingresar información en campos (obligatorios):
      1. Titulo.
      2. Descripción.
      3. Link a repo GitHub.
      4. Link a proyecto desplegado.
      5. Imagen o Ícono.
   2. Pulsar botón agregar.
   3. La página volvera a 'index.php'.

### En producción
1. Utilizar archivo alternativo 'db-alt.php'. (en caso de clonar el repositorio)
   1. Cambiar nombre de archivo a 'db.php' reemplazando el que se usa por defecto.
2. Ingresar credenciales.
   - Usuario: admin
   - Contraseña: 123456
3. En index.php, pulsar botón 'Agregar proyecto' si se desea.
   1. Ingresar información en campos (obligatorios):
      1. Titulo.
      2. Descripción.
      3. Link a repo GitHub.
      4. Link a proyecto desplegado.
      5. Imagen o Ícono.
   2. Pulsar botón agregar.
   3. La página volvera a 'index.php'.

## Herramientas de IA
- Ninguna.
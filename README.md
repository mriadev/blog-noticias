# Noticias App

Este proyecto es una aplicación web en Laravel en la que los periodistas pueden crear publicaciones de noticias y los lectores pueden visualizarlas a través de un sistema de login.

## Funcionalidades

### Login y Registro
- **Login para usuario administrador (periodista)**: El periodista puede crear, editar y eliminar noticias, así como gestionar los géneros y los lectores.
- **Login para los lectores**: Los lectores pueden registrarse, iniciar sesión, visualizar noticias y dar "me gusta" a las publicaciones.

### CRUD para el Administrador
El administrador (periodista) podrá:
- **Crear, editar y eliminar noticias**.
- **Mostrar un listado con las noticias creadas**.
- **Ver qué lectores han dado "me gusta" a una noticia**.

Las noticias tienen los siguientes atributos:
- **Título**
- **Fecha de publicación**
- **Descripción**
- **Imagen**
- **Género** (relacionado con los géneros definidos)

### CRUD para los Géneros
El administrador podrá:
- **Crear, editar y eliminar géneros**.
- **Listar los géneros y las noticias asociadas a cada género**.

Los géneros tendrán los siguientes atributos:
- **Nombre**
- **Descripción**

### CRUD para los Lectores
El administrador podrá:
- **Crear, editar y eliminar lectores**.
- **Mostrar un listado con los lectores registrados**.

Los lectores tendrán los siguientes atributos:
- **Nombre y apellidos**
- **Correo electrónico**
- **Contraseña** (para poder modificarla)
- **Teléfono**

### Perfil del Lector
- Los lectores pueden **ver su perfil** y **editar sus datos**.
- Los lectores pueden **ver todas las noticias creadas**.

### Me Gusta y Favoritos
- Los lectores pueden **dar "me gusta"** a las noticias.
- Los lectores podrán **ver todas sus noticias favoritas** en un apartado dedicado.

### Filtro de Noticias por Género
Los lectores podrán **filtrar las noticias** según el género elegido.

## Requisitos
1. **Laravel**: La aplicación está construida con el framework Laravel.
2. **Autenticación de Usuarios**: Autenticación de administradores (periodistas) y lectores.
3. **Base de Datos**: MySQL para la base de datos.
4. **Frontend**: Vistas de Laravel con Blade para la interfaz de usuario.



# Proyecto Final – Sistema de Autenticación con Laravel

Este proyecto fue desarrollado como **proyecto final de la materia**, utilizando el framework **Laravel**, con el objetivo de implementar un sistema completo de autenticación y control de acceso para usuarios.

La aplicación cuenta con autenticación tradicional (usuario y contraseña) así como inicio de sesión mediante **Google OAuth**, además de vistas diferenciadas para usuarios autenticados y no autenticados.

---

##  Tecnologías utilizadas

- **Laravel 12**
- **Laravel Breeze** (autenticación)
- **Google OAuth (Socialite)**
- **Blade Templates**
- **Tailwind CSS**
- **Vite**
- **MySQL / SQLite** (según configuración local)
- **Git & GitHub**

---

##  Funcionalidades principales

- Registro de usuarios
- Inicio de sesión con usuario y contraseña
- Inicio de sesión con cuenta de Google
- Cierre de sesión
- Dashboard protegido para usuarios autenticados
- Página de bienvenida personalizada para usuarios no registrados
- Protección de rutas mediante middleware `auth`
- Diseño responsivo y moderno

---

##  Control de acceso

- **Usuarios no autenticados**
  - Acceden a la página de bienvenida (`welcome`)
  - Pueden registrarse o iniciar sesión

- **Usuarios autenticados**
  - Acceden al **Dashboard**
  - Pueden editar su perfil
  - Acceso restringido mediante middleware

---

##  Estructura general del proyecto

- `routes/web.php`  
  Define las rutas públicas y protegidas de la aplicación

- `resources/views/`  
  Contiene las vistas Blade del sistema (welcome, dashboard, auth)

- `app/Http/Controllers/`  
  Controladores encargados de la lógica del sistema

- `database/`  
  Migraciones para la base de datos

---

## ⚙️ Instalación y ejecución

1. Clonar el repositorio:
   ```bash
   git clone <URL_DEL_REPOSITORIO>

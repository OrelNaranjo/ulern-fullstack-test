# Prueba Técnica - Ulern

## Objetivo de la prueba

Implementar un sistema de login y registro utilizando las siguientes tecnologías:

- Backend: Laravel 11
- Frontend: Vue 3
- Estilos: TailwindCSS
- Base de Datos: SQLite

## Requerimientos de la prueba

### Funcionalidades principales

- Registro de usuario con los campos: nombre, apellido, número de teléfono, email y contraseña.
- Inicio de sesión con email y contraseña.
- Página de perfil donde se visualicen los datos del usuario registrado.

### Detalles técnicos

- Crea un repositorio único con el proyecto completo.
- En el archivo README.md del repositorio, incluye las instrucciones detalladas para instalar y ejecutar el proyecto localmente.
- Se debe utilizar SQLite como base de datos para facilitar la configuración.

## Criterios de evaluación

- **Funcionalidad**: Que el registro, login y la vista del perfil funcionen correctamente.
- **Orden del código**: Estructura clara, coherente y organizada.
- **Efectividad de la solución**: Que la implementación sea eficiente y cumpla los requerimientos de manera óptima.
- **Buenas prácticas**: Uso adecuado de estándares de código, manejo de errores, y claridad en la documentación.

## Resumen del Proyecto

Este proyecto implementa un sistema de login y registro utilizando Laravel 11 para el backend y Vue 3 para el frontend, ambos configurados con Vite para el desarrollo rápido y eficiente. La base de datos utilizada es SQLite para facilitar la configuración y el despliegue. Se han añadido varias funcionalidades y mejoras para asegurar una experiencia de usuario fluida y una estructura de código organizada.

### Funcionalidades Principales

- **Registro de Usuario:** Permite a los usuarios registrarse con los campos: nombre, apellido, número de teléfono, email y contraseña.
- **Inicio de Sesión:** Permite a los usuarios iniciar sesión con su email y contraseña.
- **Página de Perfil:** Muestra los datos del usuario registrado, permitiendo la visualización de su información personal.

### Funcionalidades Extra

### Backend

- **Documentación de API con L5-Swagger:** Implementación de L5-Swagger para la documentación de la API y los endpoints de autenticación.
- **Autenticación con Laravel Sanctum:** Implementación de autenticación utilizando Laravel Sanctum.

### Frontend

- **Guardias de Autenticación:** Implementación de guardias de autenticación para proteger las rutas y asegurar que solo los usuarios autenticados puedan acceder a ciertas partes de la aplicación.
- **Componentes Compartidos:** Reutilización de componentes para mejorar la mantenibilidad y consistencia del código.
- **Store para Manejo de Datos de Usuario:** Implementación de un store para gestionar y persistir los datos del usuario.
- **Interceptor para Solicitudes Tokenizadas:** Uso de un interceptor para manejar las solicitudes con tokens de autenticación.
- **Uso de LocalStorage y SessionStorage:** Almacenamiento de tokens y datos del usuario en LocalStorage y SessionStorage para mantener la sesión del usuario.

## Instrucciones para instalar y ejecutar el proyecto localmente

### Prerrequisitos

Asegúrate de tener instalados los siguientes programas en tu máquina:

- [Node.js](https://nodejs.org/) (versión 14 o superior)
- [Yarn](https://yarnpkg.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/) (versión 7.3 o superior)

### Pasos para instalar y ejecutar el proyecto

1. **Clonar el repositorio:**

   ```sh
   git clone https://OrelNaranjo@github.com/OrelNaranjo/ulern-fullstack-test.git
   cd ulern-fullstack-test
   ```

2. **Renombrar el fichero `backend/.env.example` a `backend/.env`:**

   - En macOS y Linux:

     ```sh
     mv backend/.env.example backend/.env
     ```

   - En Windows (PowerShell):

     ```sh
     rename backend/.env.example backend/.env
     ```

3. **Ejecutar el script de configuración:**

   ```sh
   yarn setup
   ```

### Acceso a la aplicación

- El backend estará disponible en `http://localhost:8000`.
- El frontend estará disponible en `http://localhost:5173`.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Para más detalles, consulta el archivo [LICENSE](LICENSE).

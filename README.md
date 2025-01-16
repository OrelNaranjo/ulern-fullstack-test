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

## Instrucciones para instalar y ejecutar el proyecto localmente

### Backend (Laravel 11)

1. Clona el repositorio:
    ```sh
    git clone <url-del-repositorio>
    cd <nombre-del-repositorio>/backend
    ```

2. Instala las dependencias de PHP:
    ```sh
    composer install
    ```

3. Copia el archivo de entorno y configura la base de datos:
    ```sh
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:
    ```sh
    php artisan key:generate
    ```

5. Configura la base de datos en el archivo `.env`:
    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/ruta/a/tu/database.sqlite
    ```

6. Crea el archivo de base de datos SQLite:
    ```sh
    touch database/database.sqlite
    ```

7. Ejecuta las migraciones:
    ```sh
    php artisan migrate
    ```

8. Inicia el servidor de desarrollo:
    ```sh
    php artisan serve
    ```

### Frontend (Vue 3)

1. Navega al directorio del frontend:
    ```sh
    cd ../frontend
    ```

2. Instala las dependencias de Node.js:
    ```sh
    yarn install
    ```

3. Inicia el servidor de desarrollo:
    ```sh
    yarn serve
    ```

### Acceso a la aplicación

- El backend estará disponible en `http://localhost:8000`.
- El frontend estará disponible en `http://localhost:8080`.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Para más detalles, consulta el archivo [LICENSE](LICENSE).

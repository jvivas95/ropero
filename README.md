# Ropero 👕

**Clothing donation management platform — Plataforma de gestión de entregas de ropa**

[💻 GitHub](https://github.com/jvivas95/ropero)

### Sobre el Proyecto

Ropero es una aplicación web diseñada para facilitar la gestión y el seguimiento de las entregas de ropa realizadas por organizaciones sociales y entidades de voluntariado.

El proyecto nace de una necesidad real detectada durante mi experiencia como voluntario en una parroquia, donde se realizan entregas de ropa a personas en situación de vulnerabilidad.

El objetivo es digitalizar y centralizar este proceso, permitiendo registrar a las personas atendidas, gestionar el inventario de prendas y mantener un historial de las entregas realizadas.

La aplicación está planteada como una **Progressive Web App (PWA)**, con un backend desarrollado en Laravel 13 que proporcionará una API REST para un frontend independiente desarrollado con React.

🚧 **Estado del proyecto: En desarrollo.**

Actualmente se está desarrollando el backend y definiendo la arquitectura de la API REST. El frontend y las funcionalidades principales están pendientes de implementación.

### ✨ Funcionalidades previstas

Las siguientes funcionalidades forman parte de la hoja de ruta del proyecto:

- **Registro de personas** — Gestión de las personas atendidas por la organización.
- **Gestión de prendas** — Catálogo de prendas organizado por categorías, tallas y tipos.
- **Control de inventario** — Registro y seguimiento de las existencias disponibles.
- **Registro de entregas** — Historial de las prendas entregadas a cada persona, incluyendo cantidades, fechas y voluntarios responsables.
- **Gestión de voluntarios** — Registro y administración de los voluntarios que participan en las entregas.
- **Historial de atención** — Consulta del historial de entregas de cada persona.
- **Dashboard** — Resumen de actividad, estadísticas de entregas y estado del inventario.
- **Búsqueda y filtros** — Localización rápida de personas, prendas y registros de entregas.
- **Autenticación y autorización** — Control de acceso mediante usuarios y roles.
- **Interfaz responsive** — Diseño adaptado a dispositivos móviles, tablets y ordenadores.

### 🛠️ Stack Tecnológico

| Tecnología | Uso |
|---|---|
| Laravel 13 | Framework backend |
| PHP 8.3+ | Lenguaje servidor |
| MySQL 8.4 | Base de datos |
| Laravel Sanctum | Autenticación para API |
| Eloquent ORM | Modelado y relaciones de datos |
| REST API | Comunicación entre backend y frontend |
| React | Frontend (planificado) |
| JavaScript | Lógica del frontend |
| Docker | Contenerización del entorno |
| Docker Compose | Orquestación de servicios |
| Postman | Pruebas y documentación de endpoints |
| Jira | Gestión de tareas y planificación del proyecto |

### 🏗️ Arquitectura del Proyecto

Ropero utiliza una arquitectura desacoplada, separando el backend y el frontend en dos partes independientes.

**Backend — Laravel 13**

Responsable de la lógica de negocio, persistencia de datos, validaciones, autenticación y exposición de endpoints REST.

**Frontend — React (planificado)**

Aplicación cliente encargada de la interfaz de usuario y de consumir los servicios proporcionados por la API REST.

**Base de datos — MySQL**

Almacenamiento de personas, prendas, inventario, voluntarios y registros de entregas.

**Comunicación**

El frontend consumirá los endpoints del backend mediante peticiones HTTP, intercambiando información en formato JSON.

### 🐳 Entorno de Desarrollo

El proyecto utiliza Docker Compose para levantar los servicios necesarios durante el desarrollo.

Actualmente, la configuración incluye:

- Contenedor PHP/Laravel para ejecutar la API.
- Contenedor MySQL 8.4 para la persistencia de datos.
- Volumen Docker para mantener los datos de la base de datos.

### 🚀 Instalación Local

**Requisitos:**

Docker y Docker Compose.

```bash
# 1. Clonar el repositorio
git clone https://github.com/jvivas95/ropero.git
cd ropero

# 2. Construir e iniciar los contenedores
docker compose up -d --build

# 3. Acceder al contenedor de Laravel
docker compose exec api bash

# 4. Instalar dependencias
composer install

# 5. Configurar el entorno
cp .env.example .env

# 6. Generar clave de aplicación
php artisan key:generate

# 7. Ejecutar migraciones
php artisan migrate
```

La API estará disponible en:

```text
http://localhost:8000
```

**Nota:** Configura las variables de conexión a MySQL en el archivo `.env` de Laravel utilizando los parámetros definidos en `docker-compose.yml`. El host de conexión desde el contenedor de Laravel debe ser `db`.

### 📋 Gestión del Proyecto con Jira

Para organizar el desarrollo de Ropero estoy utilizando Jira como herramienta de gestión de proyectos.

El objetivo es trabajar siguiendo una metodología organizada, dividiendo el desarrollo en tareas y funcionalidades independientes.

Jira se utiliza para:

- **Planificación** — Organización de las funcionalidades y prioridades.
- **Backlog** — Registro y seguimiento de las tareas pendientes.
- **Sprints** — División del desarrollo en bloques de trabajo.
- **Seguimiento** — Control del progreso y estado de cada tarea.
- **Gestión de incidencias** — Identificación y seguimiento de errores y mejoras.

Esta experiencia me permite familiarizarme con herramientas de gestión y flujos de trabajo habituales en equipos de desarrollo profesional.

### 🗺️ Roadmap

El desarrollo se plantea en diferentes etapas:

- [x] Creación del proyecto Laravel 13.
- [x] Configuración inicial de Docker y MySQL.
- [x] Preparación de la estructura del backend.
- [ ] Diseño y desarrollo de modelos y relaciones Eloquent.
- [ ] Implementación de endpoints REST.
- [ ] Validaciones mediante Form Requests.
- [ ] Autenticación y autorización con Laravel Sanctum.
- [ ] Pruebas de endpoints con Postman.
- [ ] Desarrollo del frontend con React.
- [ ] Integración entre React y Laravel API.
- [ ] Diseño responsive y experiencia de usuario.
- [ ] Implementación de funcionalidades PWA.
- [ ] Pruebas automatizadas.
- [ ] Despliegue de la aplicación.

### 👨‍💻 Autor

**Jefferson Vivas Vásquez**

Desarrollador Web | PHP · Laravel · React

- Portfolio: https://jvivas.es
- LinkedIn: https://linkedin.com/in/vivasj
- GitHub: https://github.com/jvivas95

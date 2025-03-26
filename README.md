<!-- ~~Development Darinel Readme -->
Run the the API with the following command 
<!-- ! php artisan serve --> resulting=   INFO  Server running on [http://127.0.0.1:8000]. ->Press Ctrl+C to stop the server






<!-- ~~ End notes -->







<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# README - API UNACH

## 📌 Proyecto: API para el Módulo de Investigación y Posgrado (UNACH)
Este repositorio contiene la API desarrollada para gestionar el módulo de investigación y posgrado de la Universidad Autónoma de Chiapas (UNACH). La API está construida con **PHP Laravel** y proporciona endpoints RESTful para interactuar con el sistema.

---

## 🛠️ Tecnologías utilizadas
- **Laravel** (Framework PHP para desarrollo backend)
- **MySQL** (Base de datos relacional para almacenamiento de datos)
- **Postman** (Para pruebas de endpoints)
- **Eraser** (Para diagramas de base de datos)

---

## 📂 Estructura del Proyecto

```bash
UNACH-API
│   .env.example
│   artisan
│   composer.json
│   README.md
│
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── DataProjectsController.php
│   │   │   ├── GradesController.php
│   │   │   ├── ProjectAssignmentsController.php
│   │   │   ├── ProjectProtocolController.php
│   │   │   ├── ProjectsController.php
│   │   │   ├── StudentController.php
│   │   ├── Middleware
│
├── routes
│   ├── api.php
│   ├── web.php
│   ├── route
│   │   ├── DataProject.php
│   │   ├── Grade.php
│   │   ├── Project.php
│   │   ├── ProjectAssignments.php
│   │   ├── ProjectProtocol.php
│   │   ├── Student.php
│
├── database
│   ├── migrations (Migraciones de la base de datos)
```

---

## ⚡ Instalación y Configuración

### 1️⃣ Clonar el repositorio
```bash
git clone https://github.com/DarinelEscobar/UNACH-API.git
cd UNACH-API
```

### 2️⃣ Instalar dependencias
```bash
composer install
```

### 3️⃣ Configurar el archivo `.env`
Copiar el archivo de ejemplo y modificarlo con la configuración de la base de datos:
```bash
cp .env.example .env
```

### 4️⃣ Generar clave de aplicación
```bash
php artisan key:generate
```

### 5️⃣ Ejecutar migraciones y poblar la base de datos
```bash
php artisan migrate --seed
```

### 6️⃣ Iniciar el servidor
```bash
php artisan serve
```

---

## 🚀 Endpoints Principales
La API cuenta con múltiples endpoints organizados por funcionalidad. La documentación detallada se encuentra en Postman.

🔗 **Colección en Postman:** [Documentación de Endpoints](https://gold-sunset-893585.postman.co/workspace/UNACH~2711c1c3-aa24-401e-b5b5-4211997daa86/collection/25622754-623d14ea-0f47-41ab-89a4-cdd5ac47a14d?action=share&creator=25622754)  
⚠ **Importante:** Este enlace puede expirar en cualquier momento. No contactar para solicitarlo si deja de estar disponible.

---

## 📊 Base de Datos
La estructura de la base de datos sigue un esquema bien definido con tablas organizadas según entidades del sistema.

🔗 **Diagrama ER:** [Ver diagrama en Eraser](https://app.eraser.io/workspace/nFThhDOTXLZ1pN82iinc?origin=share)  
⚠ **Importante:** Este enlace puede expirar en cualquier momento. No contactar para solicitarlo si deja de estar disponible.

---

## 🏗️ Comandos Útiles

### 📌 Crear una migración para una tabla
```bash
php artisan make:migration create_<nombre>_table
```

### 📌 Migrar todas las tablas a la base de datos
```bash
php artisan migrate
```

### 📌 Refrescar migraciones
```bash
php artisan migrate:refresh
```

### 📌 Crear un modelo
```bash
php artisan make:model <NombreModelo>
```

### 📌 Crear un controlador
```bash
php artisan make:controller NombreCarpeta/<Nombre>Controller
```

### 📌 Crear un controlador API
```bash
php artisan make:controller api/<NombreController>
```

---

## 📄 Documentación Relacionada

- **[STD - Proyecto Estancia ](https://drive.google.com/file/d/1Alk7_GqG0IzahUECPSxkGu_6Y5rSX9Ev/view?usp=sharing)**: Descripción técnica del desarrollo de la API.
- **[Reporte Final de Estadía](https://drive.google.com/file/d/1H8BL0oBYRAFaOu1w4U8x8cypHA7sg5uD/view?usp=sharing)**: Informe completo sobre la implementación y mejoras futuras.

⚠ **Importante:** Los enlaces proporcionados pueden expirar en cualquier momento. No me hago responsable de la validez o disponibilidad de estos documentos en el futuro. **No contactar** para solicitar estos archivos en caso de que los enlaces ya no estén activos.

---


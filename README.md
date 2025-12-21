# Proyecto Quacker

Backend en **Laravel** con base de datos **MySQL**.  
Este README explica cómo instalar y configurar todo desde cero, tanto en **Linux** como en **Windows**.

---

## 📋 Requisitos previos

Antes de ejecutar el proyecto, asegúrate de tener instalados los siguientes componentes:

- **PHP** 8.5 o superior
- **Composer** (gestor de dependencias de PHP)
- **MySQL** (servidor de base de datos)
- **Git** (opcional, para clonar el repositorio)

---

## 🚀 Instalación y configuración

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/cristiann05/Quacker.git
cd Quacker
```

### 2️⃣ Instalar dependencias de PHP

```bash
composer install
```

### 3️⃣ Configurar el archivo de entorno `.env`

**En Linux / macOS:**
```bash
cp .env.example .env
```

**En Windows (CMD o PowerShell):**
```cmd
copy .env.example .env
```

Abre el archivo `.env` y configura las credenciales de tu base de datos MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quacker
DB_USERNAME=root
DB_PASSWORD=tu_contraseña_aqui

SESSION_DRIVER=database
```

> ⚠️ **Importante:** Asegúrate de crear la base de datos `quacker` en MySQL antes de continuar:
> ```sql
> CREATE DATABASE quacker;
> ```

### 4️⃣ Ejecutar seeders para poblar la base de datos

Para llenar la base de datos con datos de prueba (usuarios, quacks y quashtags), ejecuta:

```bash
php artisan migrate:refresh --seed
```

### 5️⃣ Generar la clave de aplicación

```bash
php artisan key:generate
```

### 6️⃣ Crear tabla de sesiones y ejecutar migraciones

```bash
php artisan session:table
php artisan migrate
```

### 7️⃣ Ejecutar el servidor de desarrollo

```bash
php artisan serve
```

Abre tu navegador y accede a:
```
http://127.0.0.1:8000
```

---

## 🔧 Solución de problemas comunes

### ❌ Error: "Tabla sessions no existe"

Ejecuta los siguientes comandos:
```bash
php artisan session:table
php artisan migrate
```

### ❌ Error de conexión a MySQL

- Verifica que las credenciales en el archivo `.env` sean correctas
- Asegúrate de que el servicio MySQL esté ejecutándose
- Confirma que la base de datos `quacker` esté creada

**Verificar estado de MySQL:**
```bash
# Linux
sudo systemctl status mysql

# Windows
services.msc  # Busca "MySQL" en la lista
```

### ❌ Error de permisos en Linux

Si encuentras problemas de permisos, ejecuta:
```bash
chmod -R 775 storage bootstrap/cache
chown -R $USER:www-data storage bootstrap/cache
```

# Proyecto Quacker

Backend en **Laravel** con base de datos **MySQL**.  
Este README explica cómo instalar y configurar todo desde cero, tanto en Linux como en Windows.

---

## 1️⃣ Requisitos

### Sistema operativo

- Linux (Ubuntu, Debian, Linux Mint)  
- Windows 10/11

### Software necesario

- **PHP** >= 8.0  
- **Composer** (gestor de dependencias PHP)  
- **MySQL** (servidor de base de datos)  
- **DBeaver** (opcional, administración visual de DB)  
- **Git** (para clonar el proyecto)  
- **Node.js + npm** (opcional, si usas frontend)

---

## 2️⃣ Instalación de herramientas

### Linux (Debian / Mint / Ubuntu)

#### Instalar Git y PHP

```bash
sudo apt update
sudo apt install git php php-cli php-mbstring php-bcmath php-curl php-xml unzip curl

Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
composer --version

Instalar MySQL
sudo apt install mysql-server
sudo systemctl start mysql
sudo systemctl enable mysql
sudo mysql_secure_installation

Instalar DBeaver (opcional)

Descargar .deb desde DBeaver Community

Instalar desde terminal:

cd ~/Descargas
sudo dpkg -i dbeaver-ce*.deb
sudo apt -f install

Windows

Git → https://git-scm.com/download/win

PHP → https://windows.php.net/download/

Composer → https://getcomposer.org/download/

MySQL → https://dev.mysql.com/downloads/mysql/

DBeaver → https://dbeaver.io/download/

3️⃣ Configuración de la base de datos

Conéctate a MySQL como root y crea la base de datos y el usuario:

sudo mysql -u root -p


Luego, en el prompt de MySQL:

CREATE DATABASE Quacker;
CREATE USER 'Quacker'@'localhost' IDENTIFIED BY '1599';
GRANT ALL PRIVILEGES ON Quacker.* TO 'Quacker'@'localhost';
FLUSH PRIVILEGES;
EXIT;

4️⃣ Clonar el proyecto
git clone https://github.com/cristiann05/Quacker.git
cd Quacker

5️⃣ Instalar dependencias con Composer
composer install

6️⃣ Configurar Laravel

Copiar .env.example a .env:

cp .env.example .env


Editar .env con los datos de la base de datos:

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=Quacker
DB_USERNAME=Quacker
DB_PASSWORD=1599


Limpiar caché de Laravel:

php artisan config:clear
php artisan cache:clear
php artisan config:cache

7️⃣ Ejecutar migraciones
php artisan migrate


Esto creará todas las tablas necesarias en la base de datos.

8️⃣ Levantar servidor de desarrollo
php artisan serve


URL por defecto: http://127.0.0.1:8000

9️⃣ Conectar con DBeaver (opcional)

Abrir DBeaver → Nueva conexión → MySQL

Configurar:

Host: localhost

Puerto: 3306

Usuario: Quacker

Contraseña: 1599

Base de datos: Quacker

🔟 Notas adicionales

Para crear modelos y migraciones:

php artisan make:model NombreModelo -m
php artisan migrate


Para frontend (opcional):

npm install
npm run dev

📌 Proyecto Symfony

# 🚀 Requisitos previos
Antes de comenzar, asegúrate de tener instalados los siguientes programas:

PHP (versión 8.1 o superior)

Composer (Administrador de dependencias de PHP)

Symfony CLI (Opcional, pero recomendado)

# 📥 Instalación
1️⃣ Clonar el repositorio
git clone https://github.com/lygarmo/Adminkit

2️⃣ Instalar dependencias
composer install
npm install

3️⃣ Configurar variables de entorno
DATABASE_URL="mysql://usuario:password@127.0.0.1:3306/nombre_bd" (usuario, contraseña, puerto y bbdd)

4️⃣ Crear la base de datos y ejecutar migraciones
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

5️⃣ Ejecutar el servidor de desarrollo
symfony server:start

## 📜 Otros comandos útiles
🔹 Limpiar caché: php bin/console cache:clear

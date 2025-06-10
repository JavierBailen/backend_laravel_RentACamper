### 1. Clonar el Repositorio

```bash
git clone <url-del-repositorio>
cd RentACamper_copia
```

### 2. Instalar Dependencias de PHP

```bash
composer install
```

### 3. Instalar Dependencias de Node.js

```bash
npm install
```

### 4. Configurar Variables de Entorno

Crea el archivo `.env` copiando desde el ejemplo:

```bash
cp .env.example .env
```

Si no existe `.env.example`, crea el archivo `.env` con el siguiente contenido:

```env
APP_NAME="RentACamper"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000

# Base de Datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rentacamper
DB_USERNAME=root
DB_PASSWORD=

# Cache
CACHE_STORE=database
QUEUE_CONNECTION=database
SESSION_DRIVER=database

# URLs de Servicios
NODE_API_URL=http://localhost:3000

# Mail (opcional)
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```


### 5. Generar Clave de Aplicación

```bash
php artisan key:generate
```

### 6. Configurar Base de Datos

#### Crear Base de Datos MySQL

```sql
CREATE DATABASE rentacamper;
```

#### Ejecutar Migraciones

```bash
php artisan migrate
```

### 7. Instalar y Configurar Laravel Passport

```bash
# Instalar Passport
php artisan passport:install

# Generar claves de cifrado
php artisan passport:keys
```

**Importante**: Guarda las claves que se muestran tras ejecutar `passport:install`, las necesitarás para el archivo `.env`.


### 8. Iniciar el Servidor

```bash
php artisan serve
```

El servidor estará disponible en: `http://localhost:8000`
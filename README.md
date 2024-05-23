# MyBlog - TP N°3

---------
## Guía de Instalación

- **Clonar Repositorio**: Se debe clonar el repositorio desde GitHub:
```
https://github.com/MirkoDinamarca/myblog.git
```

- **Navegar al Directorio**: Se debe ingresar al directorio del proyecto:
```
cd myblog
```

- **Instalar Dependencias (Composer)**: Instalar dependencias de Composer
```
composer install
```

- **Instalar Dependencias (Node)**: Instalar dependencias de Composer
```
npm install
```

- **Configurar entorno .env**: Instalar dependencias de Composer
```
cp .env.example .env
```
Abrir el archivo .env generado y configurar las variables de entorno (Si es que hay conexión con la base de datos).

- **Generar la compilación del frontend**: Es mejor ejecutar este comando si se desea escuchar los cambios en tiempo real, caso contrario se puede utilizar ```npm run dev```
```
npm run watch
```

- **Iniciar el Servidor de Desarrollo**:
```
php artisan serve
```

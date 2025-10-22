# Changelog

Todas las modificaciones notables de este proyecto seran documentadas en este archivo.

El formato se basa en [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
y este proyecto se adhiere a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- **Panel de Opciones del Tema**: Creado el panel "ManicomioTheme" en el administrador de WordPress usando la Settings API. Incluye opciones para activar/desactivar el carrusel de cabecera y configurar el número de imágenes a mostrar.
- **Cabecera de Página Dinámica**: Implementado un carrusel de imágenes aleatorias y un título con efecto animado ("brillo") en la plantilla de página (`page.php`). La visualización de esta sección se controla desde el nuevo panel de opciones.
- **Instalación Local de WP-CLI**: Se descargó `wp-cli.phar` al directorio raíz del proyecto para facilitar la gestión del sitio por línea de comandos.
- **Informe de Sesión**: Creado el archivo `Informe_Implementacion_y_Diagnostico_Semana_13_Oct.md` que documenta en detalle los avances y diagnósticos de la sesión.
- **Configuración de Entorno Docker en Nobara**: Se instaló y configuró Docker Engine y Docker Compose en el nuevo sistema anfitrión Nobara Linux, incluyendo la resolución de problemas de instalación y permisos. Ver `Informe_Docker_Nobara_Setup.md` para detalles.
- **Migración de Entorno de Desarrollo**: El proyecto ha sido migrado a un nuevo sistema anfitrión (Nobara Linux 42) con hardware de alto rendimiento (Intel i7-13700HX, 32GB RAM, NVIDIA RTX 5060), mejorando significativamente las capacidades y velocidad de desarrollo.

### Added
- **Plantilla de Archivo `.env`**: Se proporcionó una plantilla para el archivo `.env` con las variables de entorno necesarias para la configuración de Docker Compose y WordPress.

### Changed
- El archivo `functions.php` fue modificado para añadir la lógica del panel de opciones y para encolar el nuevo script del carrusel (`js/carousel.js`).
- El archivo `page.php` fue reestructurado para incluir la lógica condicional del nuevo carrusel y título animado, basado en los ajustes del panel de opciones.
- El archivo `style.css` fue actualizado para incluir los estilos de la animación de título `.brillo` y del carrusel `.page-carousel-container`.

### Fixed
- **Uso de Comando Docker Compose**: Corregido el uso del comando `docker-compose` a `docker compose` (con espacio) para compatibilidad con las versiones más recientes de Docker.
- **Archivo `docker-compose.yml`**: Se diagnosticó la ausencia del archivo `docker-compose.yml` en el directorio de ejecución y se proporcionaron pasos para su verificación y creación.
- **Configuración de Credenciales DB**: Se identificó la necesidad del archivo `.env` para las credenciales de la base de datos y se discutió la inconsistencia en el uso de variables entre `.env` y `docker-compose.yml` para la configuración de la base de datos.
- **Configuración `.gitignore`**: Se actualizó el archivo `.gitignore` para excluir correctamente la carpeta `wp-content/uploads/` y otros archivos/directorios específicos de WordPress, corrigiendo el prefijo de ruta.
- **Diagnóstico de Base de Datos (Parcial)**: Se identificó que el error de conexión a la base de datos en el entorno Docker se debe a una configuración incorrecta en la inicialización de los contenedores (probablemente por falta de un archivo `.env`), no a un error en `wp-config.php`. La solución (recrear el volumen de la base de datos) ha sido pospuesta.

---

## [0.3.0] - 2025-10-12

### Added

- Definida la nueva estrategia de desarrollo con un tema personalizado: `ManicomioTheme`.
- Establecido el nuevo sistema de diseño para `ManicomioTheme` con una paleta de colores y tipografías específicas para la marca.
- Añadido el plugin de composer `dealerdirect/phpcodesniffer-composer-installer` para configurar automáticamente los estándares de `phpcs`.
- Se han instalado y configurado las herramientas de análisis estático de código (`PHP_CodeSniffer` con `PHPCompatibilityWP`) para detectar de forma proactiva incompatibilidades con PHP 8+ y acelerar la estabilización del entorno local.

### Changed

- La dirección del proyecto ha pivotado hacia la creación de un tema a medida (`ManicomioTheme`), descartando el uso de temas pre-hechos como `Astra` para obtener control total sobre el diseño y los derechos de autor.
- Actualizadas las dependencias de Composer a versiones más recientes para asegurar la compatibilidad con PHP 8.4, incluyendo `phpcompatibility/phpcompatibility-wp` y `squizlabs/php_codesniffer`.
- Se ha iniciado la estrategia de refactorización "Limpieza Radical", eliminando plugins y temas obsoletos y problemáticos.

### Removed

- Se ha consolidado la pila de plugins, manteniendo únicamente `elementor` y `elementor-pro` para la maquetación, eliminando el resto de plugins de pago y de terceros que no son esenciales.
- Plugins obsoletos y problemáticos eliminados: `revslider`, `js_composer`, `qode-instagram-widget`, `qode-twitter-feed`, `duplicator`, `cookie-notice`.
- Temas obsoletos y problemáticos eliminados: `bridge` (padre), `bridge-child` (hijo) y `astra`.

### Fixed

- Corregido un error de análisis de PHP (`PHP Parse error`) que impedía la ejecución de `phpcs` debido a una versión obsoleta de `php_codesniffer`.
- Corregida la configuración de `phpcs` que no detectaba el estándar `PHPCompatibilityWP` mediante la instalación del plugin `dealerdirect/phpcodesniffer-composer-installer` y la extensión `php-xml`.
- Corregido un error de sintaxis fatal en el SDK de Freemius (incluido en `royal-elementor-addons`) que impedía la ejecución de `phpcs`. El error se debía al uso de llaves vacías en una sentencia `if`, una sintaxis obsoleta en PHP 8+.
- Corregido un error fatal de PHP en el plugin `cookie-notice` (v2.4.11). El error se debía al uso de la sintaxis obsoleta de acceso a arrays con llaves (`{}`) en `includes/bot-detect.php`, que no es compatible con PHP 8+.
- Corregido un error fatal de PHP en el plugin `mainwp-child` (v4.6). El error se producía al llamar a `curl_close()` sobre un recurso ya cerrado, lo cual no es compatible con PHP 8+. Se ajustó la condición en `class-mainwp-child-vulnerability-checker.php` para evitar el fallo.

## [0.2.3] - 2025-10-07

### Fixed (PHP 8+ Compatibility)
- Corregido un error fatal de PHP en el plugin `redirection` (v5.3.10) que impedía la carga del sitio. El error se debía al uso de la sintaxis obsoleta de acceso a arrays con llaves (`{}`) en `models/redirect/redirect.php`, que no es compatible con PHP 8+.

## [0.2.2] - 2025-10-06

### Fixed (wp-config.php)

- Se diagnosticó y resolvió la ausencia del archivo `wp-config.php` en el host local, copiándolo desde el contenedor Docker con el comando `docker cp`.
- Se corrigió un error que provocaba que el código fuente de PHP se mostrara como texto plano en el navegador, añadiendo la etiqueta de apertura `<?php` que faltaba en `wp-config.php`.
- Se identificó un error de sintaxis (un comentario roto) en `wp-config.php` como la causa de un error HTTP 500 posterior.

### Known Issues

- **BLOQUEO CRÍTICO**: El archivo `wp-config.php` actualmente tiene permisos de `root`, lo que impide realizar la corrección del error de sintaxis. Es imprescindible que el usuario ejecute `sudo chown` para transferir la propiedad y permitir la edición del archivo.

## [0.2.1] - 2025-10-06

### Fixed (Git & Permissions)

- Se eliminaron las reglas de `.gitignore` que impedían el seguimiento del archivo `wp-config.php`.
- Se intentó desactivar el modo de depuración de WordPress (`WP_DEBUG` a `false`) en `wp-config.php` para preparar el entorno para producción.
- Se corrigieron los permisos del archivo `wp-config.php` para mejorar la seguridad, cambiando el propietario a `sidzcool`.

### Changed

- Se reinició el repositorio de Git para empezar con un historial limpio y profesional, excluyendo la carpeta `uploads`.
- Se conectó el repositorio local con el remoto en GitHub y se subió el primer commit limpio.

### Known Issues (Git & Permissions)

- Un problema persistente de permisos en el sistema del usuario (Kali/zsh) impide la modificación programática de `wp-config.php`, incluso después de cambiar el propietario del archivo. El próximo paso requiere una edición manual por parte del usuario.

## [0.2.0] - 2025-10-06

### Fixed (PHP 8+ Compatibility)

- Corregido un error fatal de PHP en el plugin `js_composer` (WPBakery) debido a una sintaxis de operador ternario anidado no compatible con PHP 8+. Se ajustó el código en `class-vc-frontend-editor.php` para usar paréntesis, permitiendo que el sitio local cargue correctamente.

### Added

- Inicializado el repositorio de Git en el directorio del proyecto.
- Configurado el archivo `.gitignore` para excluir archivos de WordPress y del sistema.
- Realizado el primer commit del proyecto.

## [0.1.0] - 2025-10-04

### Added

- Configuracion inicial del proyecto.
- Creacion de los archivos CHANGELOG.md y README.md.
- Definicion del flujo de trabajo profesional (Clonar -> Codificar -> Sincronizar).
- Plan establecido para crear un entorno de desarrollo local para `elmanicomiotattoo.es`.
# Changelog

Todas las modificaciones notables de este proyecto seran documentadas en este archivo.

El formato se basa en [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
y este proyecto se adhiere a [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.2.2] - 2025-10-06

### Fixed
- Se diagnosticó y resolvió la ausencia del archivo `wp-config.php` en el host local, copiándolo desde el contenedor Docker con el comando `docker cp`.
- Se corrigió un error que provocaba que el código fuente de PHP se mostrara como texto plano en el navegador, añadiendo la etiqueta de apertura `<?php` que faltaba en `wp-config.php`.
- Se identificó un error de sintaxis (un comentario roto) en `wp-config.php` como la causa de un error HTTP 500 posterior.

### Known Issues
- **BLOQUEO CRÍTICO**: El archivo `wp-config.php` actualmente tiene permisos de `root`, lo que impide realizar la corrección del error de sintaxis. Es imprescindible que el usuario ejecute `sudo chown` para transferir la propiedad y permitir la edición del archivo.

## [0.2.1] - 2025-10-06

### Fixed
- Se eliminaron las reglas de `.gitignore` que impedían el seguimiento del archivo `wp-config.php`.
- Se intentó desactivar el modo de depuración de WordPress (`WP_DEBUG` a `false`) en `wp-config.php` para preparar el entorno para producción.
- Se corrigieron los permisos del archivo `wp-config.php` para mejorar la seguridad, cambiando el propietario a `sidzcool`.

### Changed
- Se reinició el repositorio de Git para empezar con un historial limpio y profesional, excluyendo la carpeta `uploads`.
- Se conectó el repositorio local con el remoto en GitHub y se subió el primer commit limpio.

### Known Issues
- Un problema persistente de permisos en el sistema del usuario (Kali/zsh) impide la modificación programática de `wp-config.php`, incluso después de cambiar el propietario del archivo. El próximo paso requiere una edición manual por parte del usuario.

## [0.2.0] - 2025-10-06

### Fixed
- Corregido un error fatal de PHP en el plugin `js_composer` debido a sintaxis obsoleta, permitiendo que el sitio local cargue correctamente.

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
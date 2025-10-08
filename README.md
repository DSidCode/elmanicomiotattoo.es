# El Manicomio Tattoo - Sitio Web Oficial

Este repositorio contiene el código fuente y el proceso de desarrollo para la refactorización y modernización del sitio web oficial de **El Manicomio Tattoo Studio**. El proyecto tiene como objetivo transformar un sitio WordPress antiguo en una plataforma moderna, de alto rendimiento y totalmente personalizada.

## Descripción del Proyecto

El objetivo principal es estabilizar, optimizar y rediseñar por completo la presencia en línea del estudio de tatuajes. Esto implica:

1.  **Estabilización del Entorno**: Migrar el sitio a un entorno de desarrollo local moderno (Docker, PHP 8+) y solucionar incompatibilidades y errores críticos.
2.  **Refactorización del Tema**: Abandonar temas de terceros (`Bridge`, `Astra`) para desarrollar un tema a medida desde cero, llamado `ManicomioTheme`, que otorga control absoluto sobre el diseño, el rendimiento y los derechos de autor.
3.  **Optimización de Plugins**: Reducir la dependencia de plugins de terceros, manteniendo únicamente los esenciales (`Elementor`, `Elementor Pro`) para garantizar un rendimiento óptimo y una mantenibilidad a largo plazo.
4.  **Rediseño de Experiencia de Usuario (UX)**: Implementar un nuevo sistema de diseño que refleje la identidad de marca del estudio.

## Sistema de Diseño (`ManicomioTheme`)

La nueva identidad visual se basa en la siguiente paleta de colores y tipografías:

### Colores

#### Colores de Marca (Personalizados)
- **Brand 1**: `#007210`
- **Brand 2**: `#4AFF07`
- **Subtexto**: `#C9C9C9`
- **Fondo**: `#000000`

#### Colores del Sistema
- **Principal**: `#FFFFFF`
- **Secundario**: `#4C5056`
- **Texto**: `#FFFFFF`
- **Énfasis**: `#61CE70`

### Tipografías

- **Principal**: Roboto, 600
- **Secundario**: Roboto Slab, 400
- **Texto**: Roboto, 400
- **Énfasis**: Roboto, 500

## Pila Tecnológica

- **CMS**: WordPress
- **Entorno de Desarrollo**: Docker
- **Servidor Web**: Apache
- **PHP**: 8.2+
- **Base de Datos**: MariaDB
- **Maquetador Visual**: Elementor & Elementor Pro
- **Análisis de Código**: PHP_CodeSniffer con PHPCompatibilityWP

## Autor

Este proyecto está siendo diseñado y desarrollado por **SidzCool** como diseñador y desarrollador FullStack.
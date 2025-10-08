# Plan de Desarrollo y Refactorización: ManicomioTheme

Este documento describe la estrategia y los pasos a seguir para la construcción del tema personalizado `ManicomioTheme`, enfocado en la identidad visual y la experiencia de usuario del estudio de tatuajes "El Manicomio".

## Fase 1: Fundación y Diseño Esencial

El objetivo de esta fase es establecer la apariencia visual principal del sitio y las plantillas estructurales.

### Paso 1: Cimentación del Estilo Base (CSS)

*   **Objetivo:** Establecer la base visual del sitio. Fondos negros, tipografía principal y colores base.
*   **Acciones:**
    1.  **Cargar las fuentes:** Modificar `functions.php` para cargar correctamente "Roboto" y "Roboto Slab" desde Google Fonts.
    2.  **Aplicar estilos globales:** En `style.css`, aplicar las variables CSS que ya definimos al `<body>` y a los elementos base (párrafos, enlaces, etc.). Esto establecerá inmediatamente el fondo negro (`--color-background`) y el color de texto principal (`--color-text`).
    3.  **Definir tipografía base:** Asignar las familias de fuentes (`--font-primary`, `--font-secondary`) y los pesos a los encabezados (`h1`-`h6`) y al cuerpo del texto.

### Paso 2: Maquetación de la Estructura Principal (PHP/CSS)

*   **Objetivo:** Crear una navegación principal y un pie de página que sean funcionales y coherentes con la estética del estudio.
*   **Acciones:**
    1.  **Estructurar `header.php`:** Añadir el marcado HTML para el logo y el menú de navegación principal (`top-navigation`).
    2.  **Estilizar la cabecera:** Usar CSS para que la cabecera tenga fondo negro, el logo destaque y los enlaces del menú usen la tipografía y colores de la marca.
    3.  **Estructurar y estilizar `footer.php`:** Diseñar las columnas del pie de página para widgets (información de contacto, redes sociales, etc.) y asegurar que los créditos (`DaniSid.com`) estén correctamente implementados.

### Paso 3: Diseño de las Plantillas Principales (PHP/Elementor)

*   **Objetivo:** Crear las plantillas base para las páginas y las entradas del blog, que servirán como lienzo para el contenido.
*   **Acciones:**
    1.  **Plantilla de Página (`page.php`):** Crear una plantilla limpia y de ancho completo, ideal para ser personalizada con Elementor.
    2.  **Plantilla de Entrada de Blog (`single.php`):** Diseñar cómo se verá una entrada individual, asegurando que el título, el contenido y los metadatos (autor, fecha) sean legibles y atractivos sobre el fondo oscuro.
    3.  **Plantilla de Archivo de Blog (`archive.php`):** Crear la vista de listado para las entradas del blog, con un diseño de cuadrícula o lista que sea visualmente interesante.

---

## Fase 2: Contenido Clave y Funcionalidades

### Paso 4: Reconstrucción del Contenido de Portafolio (PHP/CPT)

*   **Objetivo:** Asegurar que el contenido clave del sitio (portafolios) tenga un lugar en la nueva estructura.
*   **Acciones:**
    1.  **Registrar Tipo de Contenido Personalizado (CPT):** En `functions.php`, registrar el CPT `portafolio` para mostrar los trabajos de los artistas.
    2.  **Registrar Taxonomía:** Asociar la taxonomía `estilo-de-tatuaje` al CPT de portafolio para poder filtrar los trabajos.
    3.  **Crear Plantillas de Portafolio:** Diseñar `archive-portafolio.php` (la galería) y `single-portafolio.php` (el detalle de un trabajo).

---

## Fase 3: Funcionalidades Adicionales (Postergado)

*   **Objetivo:** Implementar secciones de perfiles de artistas y testimonios de clientes en una etapa posterior del desarrollo.
*   **Acciones Futuras:**
    *   Registrar los CPTs `artistas` y `testimonios`.
    *   Crear las plantillas correspondientes para mostrar esta información.
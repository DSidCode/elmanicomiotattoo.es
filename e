[33mcommit 7b6d5c77c9623ea67dd23faad104dbd67be255d2[m[33m ([m[1;36mHEAD[m[33m -> [m[1;32mmain[m[33m, [m[1;31morigin/main[m[33m)[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Wed Oct 8 21:06:29 2025 +0200

    feat(theme): Implementa sistema de diseño y plan de desarrollo
    
    Este commit establece los cimientos para el nuevo ManicomioTheme y realiza una limpieza general de la documentación y configuración del proyecto.

[33mcommit 948e21e1a6b7b2bd17abbe3743273cee934ab9b0[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Wed Oct 8 14:07:01 2025 +0200

    feat(theme): Scaffold ManicomioTheme and document refactoring process

[33mcommit 4052658a2efca03a7b5110d8fad3a8255f3eaef9[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 20:47:41 2025 +0200

    refactor: Limpieza final total. Se eliminaron 18 plugins no esenciales para la estabilidad, dejando solo Elementor, CF7 y Redirection.

[33mcommit 785861bfba38ff4125273861f0960f205d3bebec[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 20:14:58 2025 +0200

    refactor: Limpieza radical. Eliminación del tema Bridge y plugins premium/obsoletos por vulnerabilidad e incompatibilidad con PHP 8.x. Instalación del tema base (Astra/Blocksy) para estabilización.

[33mcommit 65d3c0b9b7cec30325db6065f28ef145091de32d[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 16:26:52 2025 +0200

    chore: Elimina wp-config.php de la raíz del proyecto
    
    Se elimina el archivo wp-config.php que se encontraba incorrectamente en el directorio raíz. El archivo de configuración correcto reside en 'elmanicomiotattoo_local/' y no se ve afectado por este cambio.

[33mcommit 0fe1ba56694bf995ebbadb8c5b4a56df76371d92[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 16:25:10 2025 +0200

    docs: Añade informe de proceso de configuración
    
    Se incorpora el documento que detalla la configuración inicial del entorno de desarrollo local para elmanicomiotattoo.es.

[33mcommit 521c3e52695bf9f3b612bdcaa82abcf35eaf34d8[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 16:19:47 2025 +0200

    fix(plugins): Corrige compatibilidad con PHP 8+ en plugins
    
    - Se soluciona el uso de la sintaxis obsoleta de acceso a arrays con llaves ({}) en el plugin 'cookie-notice'.
    
    - Se ajusta el manejo de recursos cURL en 'mainwp-child' para prevenir errores fatales en PHP 8+.

[33mcommit aa8382682e65bc4566181488d762c1e8c6f97ecf[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 16:00:34 2025 +0200

    feat(dev): Actualiza dependencias y corrige ejecución de phpcs
    
    Se soluciona el error 'PHP Parse Error' que impedía ejecutar el análisis de compatibilidad con 'phpcs' en PHP 8.4.
    
    - Se actualizan las dependencias de Composer a versiones recientes, incluyendo 'php_codesniffer' y 'phpcompatibility/phpcompatibility-wp'.
    
    - Se añade y configura 'dealerdirect/phpcodesniffer-composer-installer' para registrar automáticamente los estándares de 'phpcs'.
    
    - Se actualiza el '.gitignore' para excluir el directorio 'vendor' y los reportes generados.

[33mcommit f750ccf36d8f943f7ce6ef75f1229025dcf87842[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 00:35:07 2025 +0200

    Actualizacion de Readme y Changelog

[33mcommit 2968e975ad1cba8330c29b553552f450ee1d281f[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Tue Oct 7 00:33:32 2025 +0200

    Fixed: Sintaxis final de wp-config.php y WP_DEBUG desactivado.

[33mcommit a7e542400bf3ac44aca0f6ffede873ac9b6091ec[m
Author: root <root@kaliSid.Cool-2>
Date:   Mon Oct 6 23:40:57 2025 +0200

    Fix: Archivos grandes y de backup excluidos. Listo para el push.

[33mcommit fc311c1a67eca8c90bc9721a55540934fb5e8957[m[33m ([m[1;31morigin/master[m[33m)[m
Author: DSidCode <danielsid3d@gmail.com>
Date:   Mon Oct 6 14:58:39 2025 +0200

    Initial commit (clean) - Project structure without uploads

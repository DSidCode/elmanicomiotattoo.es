# **🚀 Informe de Proceso: Configuración del Entorno de Desarrollo elmanicomiotattoo.es**

Fecha: 6-7 de Octubre de 2025  
Objetivo: Establecer un entorno de desarrollo local profesional para elmanicomiotattoo.es utilizando Docker y Git, y sincronizar el código con GitHub.

## **1\. Configuración del Entorno Local y Migración**

El sitio fue clonado y configurado en el stack Docker Compose para garantizar un entorno de desarrollo aislado y reproducible.

| Tarea | Resultado |
| :---- | :---- |
| **Configuración del Stack** | Se levantó un stack Docker Compose (wordpress \+ db/MariaDB). |
| **Migración (Duplicator)** | Éxito en la clonación de archivos y base de datos. Se resolvió el error de conexión forzando la cuenta root de MariaDB durante la instalación. |
| **Acceso Local** | El sitio es accesible localmente en http://localhost:8080. |
| **Corrección de Código** | Se resolvió un **Error HTTP 500** causado por una sintaxis de operador ternario obsoleta en el plugin `js_composer` (WPBakery), incompatible con la versión de PHP 8.3 del contenedor. Además, se corrigió un error de sintaxis en `wp-config.php`. |

## **2\. Resolución de Problemas Críticos de Git y GitHub**

El control de versiones se vio bloqueado por fallos de autenticación y límites de tamaño de archivo.

| Problema | Solución Implementada | Estado |
| :---- | :---- | :---- |
| **Autenticación (403)** | Se resolvió generando un **Personal Access Token (PAT)** de tipo Clásico y usando el token en lugar de la contraseña para el *push*. | ✅ Resuelto |
| **Límite de 100 MB** | Se implementó **git rm \--cached** para eliminar del índice los archivos de respaldo (\*.sql, .zip) y la carpeta de medios (uploads/) que excedían el límite de GitHub. | ✅ Resuelto |
| **Rama Desconocida** | Se ejecutó **git branch \-M main** para renombrar la rama local de master a main, coincidiendo con el repositorio remoto. | ✅ Resuelto |
| **Sincronización** | El **git push \--set-upstream origin main** fue **exitoso**, sincronizando el código fuente con GitHub. | ✅ Resuelto |

## **4\. Resolución de Problemas Recientes (24 de Octubre de 2025)**

Se abordaron y resolvieron varios problemas críticos para la correcta visualización del sitio y el contenido multimedia:

| Problema | Solución Implementada | Estado |
| :---- | :---- | :---- |
| **Credenciales de Base de Datos no definidas** | Se creó el archivo `.env` con las credenciales correctas (`MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`, `MYSQL_ROOT_PASSWORD`), incluyendo el manejo de caracteres especiales en la contraseña mediante comillas dobles. | ✅ Resuelto |
| **`docker-compose.yml` no importaba DB** | Se confirmó que el `docker-compose.yml` ya estaba correctamente configurado para importar el archivo `elmanicomio_backup.sql` al iniciar el contenedor `db`. | ✅ Resuelto |
| **Plugin `pro-elements` no instalado/activo** | Se copió el archivo `pro-elements.zip` al contenedor, se instaló la utilidad `unzip` en el contenedor, se descomprimió el plugin y se activó mediante WP-CLI. | ✅ Resuelto |
| **Contenido Multimedia no visible** | Se diagnosticó que los archivos multimedia no estaban físicamente en la carpeta `wp-content/uploads` del host. Se corrigió descomprimiendo el `uploads.zip` en una carpeta temporal y moviendo su contenido a la ubicación correcta, resolviendo problemas de permisos y estructura anidada del zip. | ✅ Resuelto |
| **URLs de Medios Rotas** | Se ejecutó `wp search-replace` para actualizar todas las URLs de `elmanicomiotattoo.es` a `http://localhost:8080` en la base de datos de WordPress. | ✅ Resuelto |
| **Caché de WordPress** | Se limpió la caché de WordPress usando WP-CLI para asegurar que los cambios en la base de datos y archivos se reflejaran correctamente. | ✅ Resuelto |

## **3\. Estado Final y Flujo de Trabajo**

El proyecto está listo para el desarrollo activo.

| Componente | Estado | Detalles |
| :---- | :---- | :---- |
| **Entorno Local** | **Operativo** | Sitio web funcional y accesible en Docker. |
| **Repositorio Git** | **Sincronizado** | El código está en GitHub. Solo se versionan los archivos de desarrollo. |
| **Permisos de Archivo** | **Corregido** | Se requiere haber transferido la propiedad de wp-config.php a tu usuario (sidzcool) para futuras ediciones. |

## **⚠️ Problemas Pendientes (Despliegue a Producción)**

A pesar de que el repositorio de código está sincronizado, la conexión para el despliegue automático (si estuviera configurado) o para la carga manual de archivos al *hosting* de producción (elmanicomiotattoo.es) sigue inactiva o rota.

* **Bloqueo:** La conexión directa (FTP, SFTP o SSH) al servidor de producción aún no se ha restablecido/verificado.  
* **Próximo Objetivo:** Restablecer el acceso al servidor de *hosting* para poder realizar el despliegue de los cambios realizados localmente.

**Flujo de Trabajo para el Desarrollo:**

1. **Codificar:** Realizar cambios en VS Code.  
2. **Verificar:** Probar los cambios en http://localhost:8080/.  
3. **Sincronizar:**  
   git add .  
   git commit \-m "Descripción de los cambios"  
   git push

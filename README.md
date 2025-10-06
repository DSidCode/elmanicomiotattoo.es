# Proyecto de Desarrollo Local para elmanicomiotattoo.es

## 1. Propósito

Este proyecto establece un entorno de desarrollo local y un flujo de trabajo profesional para el sitio web de WordPress `elmanicomiotattoo.es`. El objetivo principal es eliminar la práctica de editar código directamente en el servidor de producción, reduciendo el riesgo de errores y caídas del sitio.

## 2. Flujo de Trabajo

Seguimos un proceso de tres etapas: **Clonar → Codificar → Sincronizar**.

1.  **Clonar**: Copiar el sitio web completo (archivos y base de datos) del hosting a la máquina local.
2.  **Codificar**: Escribir y probar el código en un entorno local aislado y controlado.
3.  **Sincronizar**: Usar Git para gestionar los cambios y desplegarlos de forma segura al servidor en línea.

## 3. Entorno de Desarrollo Local

Para replicar el servidor de producción, el entorno local se gestionará con **Docker**. Esto garantiza la consistencia entre el entorno de desarrollo y el de producción, minimizando errores.

El stack tecnológico es el típico de WordPress:
- **Servidor Web**: Apache o Nginx
- **Lenguaje**: PHP
- **Base de Datos**: MySQL o MariaDB

## 5. Estado Actual

- **Entorno Local**: El entorno de desarrollo local con Docker está configurado y en funcionamiento. El sitio es accesible en `http://localhost:8080`.
- **Control de Versiones**: El repositorio de Git ha sido reiniciado con un historial limpio y profesional. El primer commit ya está subido a GitHub, excluyendo correctamente la carpeta `uploads`.
- **Siguiente Paso Bloqueado**: Estamos intentando desactivar el modo de depuración en `wp-config.php`. Sin embargo, nos hemos encontrado con un problema de permisos persistente en el sistema del usuario (Kali/zsh) que impide la modificación del archivo incluso con `sudo` o siendo el propietario. El próximo paso es que el usuario edite manualmente el archivo para poder continuar.
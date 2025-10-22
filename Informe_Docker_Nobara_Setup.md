# Informe de Configuración de Docker en Nobara Linux

## Resumen

Este informe detalla el proceso de instalación y configuración de Docker Engine y Docker Compose en el nuevo sistema anfitrión Nobara Linux 42, incluyendo la resolución de los problemas iniciales de "comando no encontrado" y "permisos denegados".

## Problemas Iniciales y Diagnóstico

1.  **`zsh: docker: instrucción no encontrada...`**: Este error indicaba que el comando `docker` no estaba disponible en el PATH del sistema, sugiriendo que Docker Engine no estaba instalado.
2.  **`Error al resolver la transacción: No coincide para argumento: docker-compose-plugin`**: El intento de instalar `docker-compose-plugin` a través de `dnf` falló porque el repositorio oficial de Docker no estaba configurado correctamente en Nobara. El comando `sudo dnf config-manager --add-repo ...` no funcionó como se esperaba.

## Proceso de Instalación y Solución de Problemas

Se siguieron los siguientes pasos para una instalación exitosa:

1.  **Configuración Manual del Repositorio de Docker**:
    Se creó el archivo `/etc/yum.repos.d/docker-ce.repo` manualmente para asegurar que `dnf` pudiera encontrar los paquetes de Docker.
    ```bash
    sudo tee /etc/yum.repos.d/docker-ce.repo <<EOF
    [docker-ce-stable]
    name=Docker CE Stable - \$basearch
    baseurl=https://download.docker.com/linux/fedora/\$releasever/\$basearch/stable
    enabled=1
    gpgcheck=1
    gpgkey=https://download.docker.com/linux/fedora/gpg
    EOF
    ```
2.  **Actualización de la Caché de `dnf`**:
    ```bash
    sudo dnf makecache
    ```
3.  **Instalación de Docker Engine y Plugins**:
    ```bash
    sudo dnf install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
    ```
4.  **Inicio y Habilitación del Servicio Docker**:
    ```bash
    sudo systemctl start docker
    sudo systemctl enable docker
    ```
5.  **Resolución del Error de Permisos (`permission denied`)**:
    Después de añadir el usuario al grupo `docker` (`sudo usermod -aG docker $USER`), el error `permission denied while trying to connect to the Docker daemon socket` persistió. Esto se resolvió **cerrando la sesión de usuario y volviendo a iniciarla** (o reiniciando el sistema), lo cual es necesario para que los cambios de grupo surtan efecto en la sesión actual.

## Verificación

Tras reiniciar la sesión, se verificó la instalación con éxito:

*   `docker compose version` mostró la versión de Docker Compose.
*   `docker run hello-world` ejecutó el contenedor de prueba sin errores.

## Estado Actual

El entorno de Docker en Nobara Linux está ahora completamente funcional y listo para levantar los contenedores del proyecto `elmanicomiotattoo.es`.
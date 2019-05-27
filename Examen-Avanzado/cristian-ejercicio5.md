## Docker

Explicar:

- docker pull: Extrae una imagen o un repositorio de un registro.
- docker create: Crea un contenedor nuevo con el nombre asignado o, de no pasarlo, lo crea con un id.
- docker  run: Extrae una imagen o repositorio y lo guarda dentro de un contenedor, el cual ejecuta en ese momento.

Diferencia entre imagen y contenedor:
-Un contenedor es un proceso que se ejecuta en un host. El host puede ser local o remoto. Cuando un operador ejecuta la ejecución de la ventana acoplable, el proceso contenedor que se ejecuta se aísla en el sentido de que tiene su propio sistema de archivos, su propia red y su propio árbol de proceso aislado, separado del host.

-Una imagen es como una plantilla, una captura del estado de un contenedor, la cual contiene lo que necesitamos.

## Dar los comandos para bajar una imagen de PHP7, PHP6 y PHP5
PHP-7: docker pull dhas/php71
PHP 6: docker pull apiki/php6
PHP 5: docker pull scomm/php5.6
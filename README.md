# Bienvenidos a la lata del freeswitch

## Este repositorio contiene al freeswitch 1.6

### Generando imagen de docker

```
git clone https://github.com/krazyciomar/fs.git
cd fs
docker build -t fsimage ./
```

### Ejecutando generando container


El container debe ser generado y debe correr dentro de una red de docker que se encuentre en **modo bridge**.
En este ejemplo tenemos la red *puente*, la IP: *10.10.10.1*, nombre del container *fs* utilizando la imagen que creamos arriba *fsimage*.

El directorio */root/fs/recordings* corresponde a la ruta en donde se van a poner los audios de las llamadas realizadas y 
el directorio */root/fs/conf* corresponde al lugar donde reside la configuración del freeswitch conteinerizado.

```
docker run -d --volume=/root/fs/recordings:/usr/local/freeswitch/recordings --volume=/root/fs/conf:/usr/local/freeswitch/conf --net puente --ip 10.10.10.1 --name fs fsimage
```

Cada vez que haga falta iniciar el container: ```docker container start fs```
Cada vez que haga falta detenerlo: ```docker container stop fs```


## Configuracion
```
Para la configuración a continuación se considera que el directorio generado con el git clone es el 'fs'
```

### Contraseña de la web fsadmin

```
para cambiar el usuario y la contraseña de la interface web de administración, hay que editar el archivo:

fs/conf/webpass.php

reemplazando el usuario y la contraseña donde corresponde (sin cambiar el nombre de las variables).
```


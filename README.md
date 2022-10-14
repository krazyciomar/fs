# Bienvenidos a la lata del freeswitch

## Este repositorio contiene al freeswitch 1.6

### Generando imagen de docker

```
git clone https://github.com/krazyciomar/fs.git
cd fs
docker build -t fsimage ./
```

### Ejecutando generando container

```
El container debe ser generado y debe correr dentro de una red de docker que se encuentre en modo 'bridge'. En este ejemplo tenemos la red 'puente', la IP: 10.10.10.1, nombre del container 'fs' utilizando la imagen que creamos arriba 'fsimage':

docker run -d --volume=/root/fs/recordings:/usr/local/freeswitch/recordings --volume=/root/fs/conf:/usr/local/freeswitch/conf --net puente --ip 10.10.10.1 --name fs fsimage
```

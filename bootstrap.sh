#!/bin/bash

chown fs.fs -R /usr/local/freeswitch/conf

service apache2 start
/usr/local/freeswitch/bin/freeswitch -u fs -g fs -ncwait -nonat -rp

while true; do sleep 1d; done

FROM olfway/freeswitch
MAINTAINER Marcio Andrade <krazyciomar@gmail.com>

RUN apt-get update
RUN apt-get install coreutils -y
RUN apt-get install apache2 -y
RUN apt-get install libapache2-mod-php -y
RUN apt-get install libshout3-dev -y
RUN apt-get install libmp3lame0 -y
RUN apt-get install libmpg123-0 -y
RUN apt-get install php-sqlite3 -y
RUN apt-get install php-xml -y
RUN rm -fr /usr/local/freeswitch/conf/*
RUN groupadd fs
RUN useradd fs -g fs
RUN rm -fr /var/www/html/*
RUN rm -f /etc/apache2/envvars

EXPOSE 80

COPY www/html/ /var/www/html/
RUN chown fs.fs -R /var/www
ADD mod_shout.so /usr/local/freeswitch/mod/
ADD mod_shout.la /usr/local/freeswitch/mod/
ADD envvars /etc/apache2/envvars
RUN chown fs.fs -R /usr/local/freeswitch/

ADD bootstrap.sh /bootstrap.sh
RUN chmod 755 /bootstrap.sh
CMD ["/bootstrap.sh"]

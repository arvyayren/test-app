FROM httpd:2.4

ADD ./vhost.conf /etc/httpd/conf.d/zz010_psa_httpd.conf
WORKDIR /var/www
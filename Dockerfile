FROM ubuntu:trusty

RUN apt-get -y update
RUN apt-get -y install supervisor nginx php5-fpm php5 php5-mcrypt php5-mysql php5-gd php5-cli php5-json php5-curl curl

RUN php5enmod mcrypt

RUN apt-get clean


RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN mkdir -p /var/www/case

ADD ./start.sh /start.sh
ADD . /var/www/case

ADD ./supervisord.conf /etc/supervisord.conf

RUN mv /etc/nginx/sites-available/default /etc/nginx/sites-available/default.bak 

COPY ./default /etc/nginx/sites-available/default
RUN echo 'daemon off;' >> /etc/nginx/nginx.conf

RUN sed -i s/\;cgi\.fix_pathinfo\s*\=\s*1/cgi.fix_pathinfo\=0/ /etc/php5/fpm/php.ini

WORKDIR /var/www/case
RUN composer install

EXPOSE 8000

CMD ["/start.sh"]
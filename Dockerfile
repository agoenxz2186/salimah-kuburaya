FROM agoenxz21/php83swoole:latest
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www
COPY --chown=www-data:www-data ./ /var/www
COPY ./supervisord.conf /etc/supervisord.conf
RUN chmod -R 775 /var/www/storage
RUN chown -R www-data:www-data /var/www/storage
COPY ./run.sh /docker/run.sh
RUN chmod +x /docker/run.sh
RUN rm -rf docker-compose.yaml Dockerfile supervisord.conf run.sh
#RUN chmod +x /var/www/composer.phar
RUN rm -rf composer.lock
RUN composer install
EXPOSE 80
ENTRYPOINT ["sh", "/docker/run.sh"]
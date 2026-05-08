FROM rockylinux:9

RUN dnf -y update && \
    dnf module reset php -y && \
    dnf module enable php:8.3 -y && \
    dnf -y install httpd php php-cli php-common php-mysqlnd php-fpm && \
    dnf clean all

# Fix Apache + runtime
RUN mkdir -p /run/httpd /run/php-fpm && \
    echo "ServerName localhost" >> /etc/httpd/conf/httpd.conf

# Start cả php-fpm + httpd
CMD ["/bin/bash", "-c", "php-fpm -D && httpd -D FOREGROUND"]
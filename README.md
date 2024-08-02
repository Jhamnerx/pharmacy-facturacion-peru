PASOS PARA INICIAR REBERV EN PRODUCCION
ulimit -n
modificar limites a 10000 # /etc/security/limits.conf
INSTALAR
pecl install uv

servidor web:
server {
...

    location / {
        proxy_http_version 1.1;
        proxy_set_header Host $http_host;
        proxy_set_header Scheme $scheme;
        proxy_set_header SERVER_PORT $server_port;
        proxy_set_header REMOTE_ADDR $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "Upgrade";

        proxy_pass http://0.0.0.0:8080;
    }

    ...

}
MODIFICAR EL CONFIG

nginx.conf

user forge;
worker_processes auto;
pid /run/nginx.pid;
include /etc/nginx/modules-enabled/\*.conf;
worker_rlimit_nofile 10000;

events {
worker_connections 10000;
multi_accept on;
}

[supervisord]

[program:websockets-l11]
command=/usr/bin/php /var/www/l11/artisan reverb:start
numprocs=1
autostart=true
autorestart=true
user=ubuntu
minfds=10000

FROM nginx:1.13.9



ADD nginx.conf /etc/nginx/
ADD symfony.conf /etc/nginx/conf.d/

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN groupadd -g 1000 group
RUN useradd --shell /bin/bash --uid 1000 --gid 1000 -o -c "" -m symfony



CMD ["nginx"]


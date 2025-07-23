# Docker

This branch was created to document everything I’m learning about Docker with PHP.

---

## 📚 Table of Contents

---

## Comparison with XAMPP

XAMPP lacks many features and is not suitable for production use. This can lead to problems when your development environment differs from the production environment — what works locally might not work in production, and vice versa.

With Docker, you can ensure your local development environment closely matches the production setup.

Docker also allows you to work on multiple projects at the same time, even if they require different PHP versions.

It lets you bundle your development environment into isolated, portable containers.

![alt text](img/image.png)

You can have separate containers for the web server, PHP, database, etc.

Decoupling these services is beneficial because you can easily swap out containers individually, instead of dealing with a single, all-in-one environment.

A Docker container starts as a simple, minimal Linux machine with nothing installed by default for your application.

In the Dockerfile, you write instructions on how to build a Docker image. A Docker image is a **read-only executable package** that includes everything needed to run your application.

Images are considered templates — you can't run an image directly, but you can use it as a base to create containers.

An image is a blueprint for a container.

An image must exist in order for docker to know what to build and how to build it.

### Running Multiple Containers Simultaneously

A `docker-compose.yml` file manages multiple containers in a simple and unified way.

## Docker Compose File

no `docker-compose.yml` é onde coloca todos os componentes que serão usados, `services:` e cite os serviços

Não é bom colocar o nome padrão para os serviços, como "nginx", pois, se eventualmente estiver com otur nginx server rodando para outra aplicação se tornará ambíguo e não poderia colocar o mesmo nome.

A melhor coisa é nomear com algo que faça sentido, como o serviço que ele está perfomando 

Imagens estão localizados no registry, você pode ter o seu registry privado ou um registry centralizado

Se não especificar qual é o registry, o docker vai olhar no docker hub registry

```docker
services:
    # nginx
    web:
        image: nginx:latest
        ports:
            - '80:80'
```

```docker
docker compose up
```

The `docker compose up` command is used to build, create, and start the services defined in a docker-compose.yml file. This command orchestrates a multi-container Docker application, managing the lifecycle of all declared services, networks, and volumes.

```docker
docker ps
```

O comando acima é para ver quais containers estão em execução

```docker
docker compose ps
```

Para ver quais serviços estão em execução

## PHP Dockerfile

Há dois arquivos principais no Docker, já vimos o docker-compose.yaml file e agora vamos ver sobre o dockerfile, que é para a criação das imagens que é usado para a construção dos containers

Vamos pegar uma imagem base do php e vamos customizar, criar a minha própria imagem baseado na imagem do PHP

no Dockerfile é onde basicamente instala os componentes

```docker
docker build -t danielarrudas:php84 -f php/Dockerfile .
```

O comando acima fala para o docker qual a pasta que ele vai se basear para construir o docker, nesse caso, -t seria um apelido e -f o caminho para a pasta `/php/Dockerfile` e o . cita que seria todos os arquivos.

Dockerfile:
```docker
FROM php:8.4.8-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
```
O comando `docker images` mostra quais imagens temos:


| Repository | TAG | IMAGE ID | CREATED | SIZE |
| ---------- | --- | -------- | ------- | ---- |
| danielarrudas | php84 | ce368240e4f7 | 14 seconds ago | 133MB |
| nginx | latest | 8e368240e4f7 | 8 days ago | 133MB |

---

## Nginx Configuration

`docker exec -it php-studies-web-1 sh`

Docker executa um comando no meu container
-it significa "interactive", o que significa que posso interagir com meu container

sh to shell my container

`cat /etc/nginx/conf.d/default.conf `

`fastcgi_param`
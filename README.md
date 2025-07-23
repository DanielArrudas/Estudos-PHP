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

```bash
docker compose up
```

The `docker compose up` command is used to build, create, and start the services defined in a docker-compose.yml file. This command orchestrates a multi-container Docker application, managing the lifecycle of all declared services, networks, and volumes.

```bash
docker ps
```

O comando acima é para ver quais containers estão em execução

```bash
docker compose ps
```

Para ver quais serviços estão em execução



# Docker

This branch was created to document everything I learn about Docker in PHP.

---

## 📚 Table of Contents

- [Why Docker Instead of XAMPP?](#why-docker-instead-of-xampp)
- [What is a Docker Image?](#what-is-a-docker-image)
- [What is a Docker Container?](#what-is-a-docker-container)
- [Dockerfile](#dockerfile)
- [Docker Compose](#docker-compose)
- [Running Multiple Containers](#running-multiple-containers)
- [Conclusion](#conclusion)

---

## Why Docker Instead of XAMPP?

XAMPP lacks many features and is not suitable for production. This can create discrepancies between your development and production environments. What works locally might not work in production, and vice versa.

With Docker, you can ensure that your local development environment closely mirrors your production environment.

Docker also allows you to work on multiple projects at the same time, even if they require different versions of PHP.

It lets you bundle your development environment into isolated and portable containers.


You can run separate containers for the web server, PHP, database, and more.

Decoupling services is a good practice. You can easily swap one container for another without interfering with the rest of your stack.

---

## What is a Docker Image?

A Docker container starts as a simple vanilla Linux machine with nothing installed.

In the Dockerfile, you write instructions to build a Docker image. A Docker image is a read-only executable package that includes everything needed to run your application.

Images are considered templates: they cannot be run directly, but you can use them as a base to build your own containers.

---

## What is a Docker Container?

A container is a runtime instance of a Docker image. It is a lightweight, standalone, executable package of software that includes everything needed to run a piece of software, including the code, runtime, libraries, and dependencies.

Each container is isolated from others and from the host system, which improves security and stability.

---

## Dockerfile

The `Dockerfile` contains step-by-step instructions to create a Docker image.

For example:
```Dockerfile
FROM php:8.1-apache
COPY . /var/www/html/
```

This Dockerfile creates a container using the official PHP image with Apache and copies your application files into the web server directory.

---

## Docker Compose

`docker-compose.yml` is a configuration file that allows you to define and run multiple containers with a single command.

Example:
```yaml
version: '3.8'
services:
  web:
    image: php:8.1-apache
    ports:
      - "8080:80"
    volumes:
      - .:/var/www/html/
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: root
```

This example runs a PHP container and a MySQL container, and links them together for seamless development.

---

## Running Multiple Containers

Docker Compose simplifies the management of multiple containers. You can bring them up with:

```bash
docker-compose up -d
```

And shut them down with:

```bash
docker-compose down
```

It’s a great way to ensure consistency and isolation across your entire development environment.

---

## Conclusion

Docker helps you create consistent development environments, simplifies project setup, and allows scalable architecture using containers.

Stay tuned as this documentation grows with more examples and advanced concepts!

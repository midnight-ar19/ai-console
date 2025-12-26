# AI-Console

AI-Console es una herramienta de línea de comandos (CLI) desarrollada en **PHP** que permite interactuar con distintos servicios de **inteligencia artificial** desde la terminal, de forma simple y extensible.

El proyecto está pensado como un **addon reutilizable**, con una arquitectura limpia que facilita agregar nuevos proveedores de IA.

---

## 🚀 Características

* CLI interactivo desde la terminal
* Soporte para múltiples proveedores de IA (OpenAI, Ollama)
* Arquitectura orientada a objetos
* Inyección de dependencias
* Código limpio y fácil de extender
* Pensado como herramienta reutilizable

---

## 📦 Requisitos

* PHP 8.1 o superior
* Composer
* Clave de API (para OpenAI, si se utiliza)

---

## ⚙️ Instalación

Clona el repositorio e instala las dependencias:

```bash
composer install
```

---

## ▶️ Uso

Ejecuta la herramienta desde la raíz del proyecto:

```bash
php .\bin\bot.php
```

Desde el menú podrás elegir el proveedor de IA y comenzar a interactuar desde la terminal.

---

## 🔑 Configuración

Para usar OpenAI, crea un archivo `.env` con tu clave de API:

```env
OPENAI_API_KEY=tu_api_key_aqui
```

> ⚠️ No subas tu archivo `.env` al repositorio.

---

## 🧠 Arquitectura

El proyecto está diseñado para ser escalable.
Cada proveedor de IA se implementa como un servicio independiente, lo que permite agregar nuevos proveedores sin modificar la lógica principal del CLI.

---

## 📁 Estructura del proyecto

```text
src/
├── Chat.php
├── OpenAIService.php
│── OllamaService.php
bin/
│── bot.php
bootstrap.php
composer.json
README.md
```

---

## 🎯 Objetivo del proyecto

Este proyecto fue creado como **proyecto de portafolio**, con el objetivo de demostrar:

* Buenas prácticas en PHP
* Diseño orientado a objetos
* Organización de código
* Desarrollo de herramientas CLI
* Pensamiento backend y arquitectura

---

## 📄 Licencia

Este proyecto se distribuye bajo la licencia MIT.

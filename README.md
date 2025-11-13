# 💻 Sistema Web de Monitoreo y Análisis de Sensores (2024-2025)

[![Laravel v10.x](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/) 
[![PHP v8.2+](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
> **Proyecto de Residencia Profesional:** Plataforma monolítica robusta para la **Configuración, Monitoreo y Análisis en tiempo real** de datos ambientales capturados por dispositivos **ESP32**.

## ✨ Visión General

Este proyecto consiste en una aplicación web monolítica desarrollada con **Laravel**, diseñada para la ingesta, el procesamiento y la visualización de datos de sensores. La solución aborda la necesidad de obtener información crítica (**Radiación UV, Temperatura, Humedad y Gases**) de manera oportuna para la toma de decisiones.

La arquitectura central se basa en:
* **Dispositivos ESP32:** Encargados de la recopilación de mediciones ambientales.
* **Capa de API REST (Laravel):** Canal seguro y eficiente para la transferencia de datos entre el microcontrolador y la aplicación.
* **Plataforma Web (Laravel Blade, JS):** Interfaz para la visualización de datos en dashboards en tiempo oportuno y analisis de datos semanales y mensuales por medio de graficas.

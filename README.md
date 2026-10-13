# «Удивительная и неизведанная Арктика».

## Требования

- [Docker](https://www.docker.com/) и Docker Compose
- [Composer](https://getcomposer.org/)
- PHP 8.5

## Установка и запуск

### 1. Установка зависимостей

```bash
composer install --ignore-deps
```

### 2. Запуск контейнеров

```bash
./vendor/bin/sail up -d
```

Сайт будет доступен http://localhost
Вместо php писать ./vendor/bin/sail (php)
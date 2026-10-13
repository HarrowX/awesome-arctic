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

### 3. Запуск миграций с сидерами

```bash
./vendor/bin/sail artisan migrate --seed
```


## Основные маршруты

Основаня страница:
- http://localhost

Админ-панель:
- http://localhost/admin (email: admin@admin.ru, password: admin)

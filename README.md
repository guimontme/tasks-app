# Task App with Laravel and Vue.js

This is a tasks project with Laravel and Vue.js.

### Dependences

- MySQL
- Apache
- phpMyAdmin
- PHP 7.4
- Laravel 8
- Node
- Vue.js 2
- Sass


## Before start 
Change values in root doc .env
```env
ADMIN_EMAIL=admin@example.com

MAIL_MAILER=smtp
MAIL_HOST=smtp.domain.com
MAIL_PORT=466
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=site@domain.com
```

## Commands

To **install** the dependencies:

```sh
bin/install
```

To **init** the aplication:

```sh
bin/init
```

To **create a user**:

```sh
bin/user
```

To **run** the application:

```sh
bin/stop
```

To **run** the application:

```sh
bin/start
```

To **run** the "laravel" and "vue" commands:

```sh
bin/run
```

To open container's **bash**

```sh
bin/bash backend
bin/bash frontend
```

To **restart** the application:

```sh
bin/restart
```

To **destroy** the application:

```sh
bin/kill
```

> This command includes:
>
> - delete laravel
> - delete vue
> - delete node
> - delete Database
> - delete containers
> - delete container's volume
> - delete container's network

---

## Access

### MySQl

```txt
User: admin
Password: admin1234
```

MariaDB's IP:

```txt
padrão: 171.0.0.10:3306
local: 127.0.0.1:3306
```

### phpMyAdmin

phpMyAdmin's IP:

```txt
padrão: 171.0.0.15:80
local: 127.0.0.1:8306
```

### Laravel

Laravel's IP:

```txt
padrão: 171.0.0.20:8000
local: 127.0.0.1:8000
```

### Vue

Vue's IP:

```txt
local: 127.0.0.1
```

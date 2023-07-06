<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

Sistem sederhana untuk mengatur hak akses setiap role, pada kasus ini terdapat contoh role `admin`, `role1`, dan `role2`. Setiap role memiliki hak akses yang berbeda-beda. Untuk mengatur hak akses setiap role, dapat dilakukan pada halaman `/permission`.

## Installation

```bash
composer install
```

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan serve
```

## User

```bash
Admin
email: user@mail.com
password: password
```

```bash
User Role1
email: user2@mail.com
password: password
```

```bash
User Role2
email: user3@mail.com
password: password
```

## Route

```bash
1. / (laravel welcome page)
2. /auth (login and register page)
3. /dashboard (home page)
4. /admin (admin page)
5. /role1 (role1 page)
6. /role2 (role2 page)
7. /permission (permission control page)
8. /logout (logout)
```

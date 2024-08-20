# Laravel Project Setup

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Prerequisites

-   [Composer](https://getcomposer.org/download/).
-   [PHP](https://www.php.net/downloads.php) versi 8.2 atau lebih tinggi.
-   [MySQL](https://dev.mysql.com/downloads/mysql/)

## Instalasi

1. **Clone repository ini:**

    ```bash
    git clone https://github.com/username/repository-name.git
    cd repository-name
    ```

2. **Install dependensi menggunakan Composer:**

    ```bash
    composer install
    ```

3. **Salin file `.env.example` menjadi `.env`:**

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5. **Konfigurasi file `.env`:**

    Buka file `.env` dan sesuaikan pengaturan database Anda:

    ```env
    DB_DATABASE=nama_database
    DB_USERNAME=username_database
    DB_PASSWORD=password_database
    ```

6. **Migrasi database:**

    Jalankan perintah berikut untuk migrasi dan, jika perlu, seeding database:

    ```bash
    php artisan migrate --seed
    ```

7. **Menjalankan server lokal:**

    Jalankan perintah berikut untuk memulai server pengembangan:

    ```bash
    php artisan serve
    ```

    Proyek ini akan tersedia di `http://localhost:8000`.


## Testing API

Setelah server berjalan, Anda dapat menguji API dengan menggunakan tool seperti [Postman](https://www.postman.com/) atau [cURL](https://curl.se/).

### Contoh Penggunaan API

- **Base URL:** `http://localhost:8000/api/...`

## Dokumentasi API

Untuk dokumentasi API lengkap, kunjungi link berikut:

[Dokumentasi API di Postman](https://documenter.getpostman.com/view/35146012/2sA3sAfmrm)

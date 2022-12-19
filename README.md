# Devcode Starter using Laravel Level 1

## Hasil Akhir yang Diharapkan

Peserta dapat menampilkan hello world json pada url http://localhost:8000/hello.

## Setup environment
1. Download source code melalui link yang telah disediakan dari halaman assesment
2. Extract source code yang sudah terdownload pada perangkat anda
3. Buka source code yang sudah diextract menggunakan Code Editor, contoh Visual Studio Code
4. Jalankan `composer install` pada terminal
5. Copy file `.env.example` ke file `.env` atau melalui terminal `cp .env.example .env`
6. Jalankan `php artisan key:generate` pada terminal
7. Jalankan `php artisan serve` pada terminal, anda kemudian bisa mengakses http://localhost:8000 untuk melihat aplikasi yang anda buat

## Instruksi Pengerjaan

1. Selesaikan challenge yang terdapat pada file `routes/api.php`
2. Build project ini dengan docker.

#### Tools yang di perlukan

- Git
- Docker 

#### Cara menginstall Tools

- [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

- Docker : 
    - [Windows](https://docs.docker.com/desktop/install/windows-install/)
    - [Mac](https://docs.docker.com/desktop/install/mac-install/)
    - [Linux](https://docs.docker.com/desktop/install/linux-install/)

#### Teknologi yang Digunakan

1. [PHP](https://www.php.net/)
2. [Laravel](https://laravel.com/)

### Langkah-langkah Build menggunakan Docker
Jalankan perintah berikut untuk Build docker image  `docker build . -t {name}`

contoh :
```
docker build . -t laravel-hello
```
## Jalankan docker image
Jalankan docker image dengan perintah `docker run -p {port}:8000 {docker image}`

contoh: 
```
docker run -p 8000:8000 laravel-hello
```

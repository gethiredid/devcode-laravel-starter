# Devcode Starter using Laravel Level 2

## Hasil Akhir yang Diharapkan

Peserta dapat membuat dan menampilkan data kontak dengan menggunakan local variable

## Setup Environment

1. Download source code melalui link yang telah disediakan dari halaman assesment
2. Extract source code yang sudah terdownload pada perangkat anda
3. Buka source code yang sudah diextract menggunakan Code Editor, contoh Visual Studio Code
4. Salin isi dari file `.env.example` ke dalam file `.env`
5. Jalankan `composer install` pada terminal
5. Jalankan `php artisan key:generate` pada terminal
6. Jalankan `php artisan serve` untuk mode development pada terminal

## Instruksi Pengerjaan

1. Pastikan anda sudah meng-install tools yang diperlukan. Jika belum, silahkan ikuti langkah-langkahnya [disini](#menginstal-tools-yang-digunakan)
2. Selesaikan TODO yang terdapat pada file `app/Http/Kernel.php`, untuk menambahkan session middleware untuk api
3. Sesuaikan request dan response pada route GET `/contacts` pada file `routes/api.php` sesuai dengan [Dokumentasi API](https://documenter.getpostman.com/view/6584319/2s8Yt1rUtN) pada Postman
4. Sesuaikan request dan response pada route POST `/contacts` pada file `routes/api.php` sesuai dengan [Dokumentasi API](https://documenter.getpostman.com/view/6584319/2s8Yt1rUtN) pada Postman
5. Lakukan unit testing pada local anda dengan menggunakan Docker, langkah-langkahnya dapat dilihat [disini](#menjalankan-unit-testing-dengan-Docker)
6. Push projek ke docker hub setelah semua test case berhasil dijalankan, langkah-langkahnya dapat dilihat [disini](#push-projek-ke-docker-hub)
7. Submit image docker yang telah dipush ke Docker Hub ke Halaman Submission Devcode, langkah-langkahnya dapat dilihat [disini](#push-projek-ke-docker-hub)

## Tools dan Packages yang Digunakan

1. [Git](https://git-scm.com)
2. [Docker](https://www.docker.com)
3. [Laravel](https://laravel.com/)
4. [Composer](https://getcomposer.org/)

## Menginstal Tools yang Digunakan

-   [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
-   [Composer](https://getcomposer.org/)
-   Docker
    -   [Windows](https://docs.docker.com/desktop/install/windows-install/)
    -   [Mac](https://docs.docker.com/desktop/install/mac-install/)
    -   [Linux](https://docs.docker.com/desktop/install/linux-install/)

## Menjalankan Unit Testing dengan Docker

### Build Docker Image

Jalankan perintah berikut untuk Build docker image `docker build . -t {name}`

contoh :

```
docker build . -t laravel-hello
```

### Jalankan Docker Image

Jalankan docker image dengan perintah `docker run -e PORT=3030 -p 3030:3030 {docker image}`

contoh:

```
docker run -e PORT=3030 -p 3030:3030 laravel-hello
```

### Jalankan Unit Testing

Pastikan port ketika menjalankan docker image sama dengan `API_URL` ketika ingin menjalankan unit testing.

Jalankan perintah berikut untuk menjalankan unit testing di local:

```
docker run --network="host" -e API_URL=http://localhost:3030 -e LEVEL=2 alfi08/hello-unit-testing
```

## Submit Docker Image ke Devcode

### Build Docker Image

Jalankan perintah berikut untuk Build docker image `docker build . -t {name}`

Contoh :

```
docker build . -t laravel-hello
```

### Push projek ke Docker Hub

Pastikan sudah memiliki akun docker hub, dan login akun docker anda di lokal dengan perintah `docker login`.

Setelah itu jalankan perintah berikut untuk push docker image lokal ke docker hub.

```
docker tag laravel-hello {username docker}/laravel-hello
docker push {username docker}/laravel-hello
```

Setelah itu submit docker image ke Devcode.

```
{username docker}/laravel-hello
```

# Devcode node.js starter with express.js - Level 3

## Hasil akhir yang diharapkan

Peserta dapat membuat dan menampilkan data kontak yang terkoneksi dengan database.

## Instruksi pengerjaan

Terdapat 2 route pada file `app.js` yaitu :

- GET `/contacts`
- POST `/contacts`

Anda dapat mengubah route tersebut agar request dan response sesuai dengan [dokumentasi API](https://documenter.getpostman.com/view/6584319/2s8Yt1rUtN) pada postman.

Pastikan juga semua test berhasil ketika menjalankan unit testing lokal.

## Tools yang di perlukan

- Git
- Docker 

### Cara menginstall Tools

- [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

- Docker : 
    - [Windows](https://docs.docker.com/desktop/install/windows-install/)
    - [Mac](https://docs.docker.com/desktop/install/mac-install/)
    - [Linux](https://docs.docker.com/desktop/install/linux-install/)

## Packages yang digunakan

- Laravel

## Docker

Jika anda sudah menginstall docker, anda bisa menjalankan perintah `docker-compose up -d` untuk menjalankan API <b>Contact Manager</b> dan juga database <b>Mysql</b>. Tetapi pastikan `environment` pada file .env yang telah kamu buat dari .env.example sesuai dengan `environment` pada file `docker-compose.yaml`.

Apabila ada perubahan pada file kodingan anda, anda bisa build ulang container dengan perintah :
```bash
docker-compose up -d --force --recreate
``` 

## Menjalankan projek

- copy `.env.example` ke `.env` dan sesuaikan config untuk server dan database.
- Install package dengan perintah `composer install`.
- Jalankan `php artisan key:generate`.
- jalankan projek dengan perintah `php artisan serve`.

## Migration 

Untuk migrasi & model ORM, kamu bisa menjalankan step berikut:
1. Jalankan perintah `php artisan make:model {nama_model} -m` dalam tugas kali ini 
2. Sesuaikan migration dengan schema berikut
```sql
id: INT
full_name: string / varchar
phone_number: string / varchar
email: string / varchar
```
3. pastikan db kamu sudah berjalan dan sesuai, untuk menjalankan db image, anda bisa menjalankan command `docker compose up db -d`, sedangkan untuk konfigurasi dbnya bisa di cek pada docker-compose.yml
4. jalankan `php artisan migrate`

# Menjalankan unit testing dengan docker

Pastikan environment database dan port API pada file `.env` sama dengan `file docker-compose.yaml`.
Dan pastikan anda telah menjalakan database dan api pada docker lokal, kalau belum jalankan perintah berikut  `docker-compose up -d` atau `docker-compose up -d --build --force-recreate` untuk build ulang image ketika ada perubahan pada file.

Jalankan perintah berikut untuk melakukan unit testing:
```bash
docker run --network="host" -e API_URL=http://localhost:3030 -e LEVEL=3 alfi08/hello-unit-testing
```

# Submit ke Devcode
## Build docker image
Jalankan perintah berikut untuk Build docker image  `docker build . -t {name}`

contoh :
```bash
docker build . -t devcode-laravel
```


## Push projek ke docker hub

Pastikan sudah memiliki akun docker hub, dan login akun docker anda di lokal dengan perintah `docker login`.

Setelah itu jalankan perintah berikut untuk push docker image lokal ke docker hub.

```bash
docker tag devcode-nodejs {username docker}/devcode-laravel
docker push {username docker}/devcode-laravel
```

Setelah itu submit docker image ke Devcode.

```bash
{username docker}/devcodelaravel
```

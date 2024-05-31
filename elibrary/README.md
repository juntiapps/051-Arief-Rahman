# Elibrary

- Nama: Arief Rahman
- Nomor: 051
- Tugas JDA 2024 Fase 2

Aplikasi manajemen perpustakaan yang berfungsi untuk mengelola stok buku, pengguna, dan data peminjaman buku buku

Demo aplikasi dapat dilihat di: `https://elibrary.juntiapp.com`

## Fitur

- Autentifikasi (Login)
- Halaman untuk user dan admin berbeda
- Register user hanya dapat dilakukan ADMIN
- Manajemen Buku (CRUD)
- Kategori Buku
- Manajemen User

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan projek di PC anda

### Prasyarat

- PHP >= 8.1
- Composer
- MySQL

### Steps

1. **Clone repositori:**

    ```sh
    git clone https://github.com/juntiapps/051-Arief-Rahman.git
    cd 051-Arief-Rahman/elibrary
    ```

2. **Instal PHP dependencies:**

    ```sh
    composer install
    ```

3. **Salin file `.env.example` dan ubah menjadi `.env` lalu atur environment sesuai dengan yang anda inginkan:**

    ```sh
    cp .env.example .env
    ```

5. **Hasilkan the application key:**

    ```sh
    php artisan key:generate
    ```

6. **Atur database:**

    - Buat database baru untuk aplikasi ini.
    - Perbarui file `.env` dengan kredensial database Anda

7. **Run the migrations and seed the database:**

    ```sh
    php artisan migrate
    php artisan db:seed
    ```

8. **Jalankan Aplikasi:**

    ```sh
    php artisan serve
    ```

9. **Akses `http://localhost:8000` untuk melihat Aplikasi berjalan atau tidak.**

## Pemakaian

1. Setelah dapat dipastikan aplikasi berjalan, coba lakukan login akun admin dengan akun:
```sh
email: admin@example.com
password: password
``` 
2. Lalu buka menu daftar anggota untuk menambahkan Anggota
3. Lalu coba login dengan user yang baru saja dengan password default: `password`


## Kontak

Bila ada pertanyaan, silakan hubungi:

- **Email:** arief.rahman.6791@gmail.com
- **GitHub:** [JuntiApps](https://github.com/juntiapps)
```
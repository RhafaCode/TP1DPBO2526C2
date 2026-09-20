# TP1DPBO2526C2

## Janji
Saya Rhafa Farell Valeno dengan NIM 2508020 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Program
Program ini mengelola data film pada bioskop menggunakan konsep Object-Oriented Programming.
Class utama yang digunakan adalah `Film` dengan lima atribut:

- `id_film`: identifier unik film
- `judul`: judul film
- `genre`: genre film
- `harga_tiket`: harga tiket film
- `poster_path`: path file poster lokal


## Desain dan Flow Kode

1. Program membuat list/vector kosong untuk menyimpan object `Film`.
2. Menu menerima pilihan tambah, tampilkan, update, hapus, cari, atau keluar.
3. Setiap operasi mencari object menggunakan `id_film` sebagai identifier unik.
4. Tambah membuat object baru dan memasukkannya ke list/vector.
5. Update mengubah atribut object yang ditemukan menggunakan setter.
6. Hapus mengeluarkan object dari list/vector.
7. Cari menampilkan satu object yang memiliki ID yang diminta.

PHP menggunakan HTML Form untuk menerima input dan HTML table untuk menampilkan data. Nilai
poster diisi dengan path file lokal, misalnya `images/poster.jpg`.

## Struktur Folder

```text
TP1/
|-- cpp/
|   `-- film.cpp
|-- java/
|   `-- film.java
|-- php/
|   `-- film.php
|-- python/
|   `-- film.py
|-- Dokumentasi/
|   `-- README.md
`-- README.md
```

## Cara Menjalankan

### C++

```bash
g++ -std=c++17 cpp/film.cpp -o film_cpp
./film_cpp
```

### Java

```bash
javac java/film.java
java -cp java film
```

### Python

```bash
python3 python/film.py
```

### PHP

```bash
php -S localhost:8000 -t php
```

Buka `http://localhost:8000/main.php` pada browser.

## Dokumentasi Program

Dokumentasi screenshot untuk keempat bahasa disimpan pada folder
`Dokumentasi`. Dokumentasi menunjukkan program berhasil dijalankan dan fitur tambah,
tampilkan, update, hapus, serta cari data dapat digunakan.



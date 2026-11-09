# Katalog Buku

Contoh aplikasi Laravel sederhana untuk melihat daftar dan detail buku.

## Menjalankan aplikasi

```bash
php artisan serve
```

Buka `http://127.0.0.1:8000/buku/1` untuk melihat detail buku.

## Contoh fitur

- Route berparameter `GET /buku/{id}` menampilkan detail buku.
- `BukuController` menyiapkan data buku dan rekomendasi satu kategori.
- Blade memakai `@if` untuk kondisi rekomendasi dan `@foreach` untuk menampilkannya.
- ID buku yang tidak ditemukan menghasilkan respons 404.

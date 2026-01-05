# Admin Beasiswaku 🎓

Sistem **Admin Beasiswaku** adalah aplikasi berbasis Laravel yang digunakan untuk mengelola data beasiswa.  
Admin dapat mengatur pendaftaran, verifikasi, dan seleksi penerima beasiswa dengan lebih mudah, transparan, dan efisien.

---

## 🚀 Fitur Utama
- **Manajemen Pendaftaran**: Admin dapat membuka/menutup pendaftaran beasiswa sesuai jadwal.
- **Verifikasi Dokumen**: Memeriksa kelengkapan berkas mahasiswa.
- **Seleksi Peserta**: Menentukan penerima beasiswa berdasarkan kriteria.
- **Dashboard Admin**: Tampilan data yang rapi dengan tabel, pagination, dan row numbering otomatis.
- **Export Data**: Mendukung export ke Excel/CSV sesuai kebutuhan admin.
- **Role Management**: Hak akses berbeda untuk admin dan user.

---

## 🛠️ Teknologi
- **Laravel** (backend & routing)
- **Blade Template** (frontend)
- **MySQL** (database)
- **Laragon** (local development environment)
- **GitHub** (version control & repository)

---

## 📂 Struktur Direktori
```
adminbeasiswaku/
├── app/            # Logic utama Laravel
├── resources/views # Blade templates
├── public/         # Assets (CSS, JS, images)
├── routes/         # Definisi route
└── database/       # Migration & seeding
```

---

## ⚡ Cara Menjalankan
1. Clone repository:
   ```bash
   git clone https://github.com/Zainproject/adminbeasiswaku.git
   ```
2. Masuk ke folder project:
   ```bash
   cd adminbeasiswaku
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
4. Buat file `.env` dan sesuaikan konfigurasi database.
5. Jalankan migration:
   ```bash
   php artisan migrate
   ```
6. Start server:
   ```bash
   php artisan serve
   ```

---

## 👨‍💻 Kontributor
- **Master Penyedia Beasiswa** (Admin utama)
- Tim pengembang & mahasiswa yang berpartisipasi

---

## 📜 Lisensi
Proyek ini menggunakan lisensi **MIT** – bebas digunakan dan dikembangkan lebih lanjut.

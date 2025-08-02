# LSP Digital

Aplikasi web modern yang dibangun dengan Nuxt 3, Shadcn/UI, dan Prisma.

## Fitur

- 🚀 **Nuxt 3**
- 🎨 **Nuxt UI**
- 🗄️ **Prisma**
- 🌙 **Dark Mode**
- 📱 **Responsif**
- 🔧 **TypeScript**

## Prasyarat

- Node.js v20.19.0 atau lebih tinggi
- Mysql v5.7.33-win32
- laragon php-8.1.10
- npm atau yarn

## Mulai Cepat

1. **Instal dependensi:**
   ```bash
   npm install
   ```

2. **Siapkan basis data:**
   ```bash
   # Generate Prisma client
   npm run db:generate

   # Push skema ke database
   npm run db:push

   # Seed database dengan data contoh
   npm run db:seed
   ```

3. **Jalankan server pengembangan:**
   ```bash
   npm run dev
   ```

4. **Buka browser dan kunjungi:** `http://localhost:3000`

## Skrip yang Tersedia

- `npm run dev` - Menjalankan server pengembangan
- `npm run build` - Build untuk produksi
- `npm run preview` - Pratinjau build produksi
- `npm run db:push` - Push skema database
- `npm run db:studio` - Buka Prisma Studio
- `npm run db:migrate` - Jalankan migrasi database
- `npm run db:generate` - Generate Prisma client
- `npm run db:seed` - Seed database dengan data contoh

## Struktur Proyek

```
├── assets/           # Aset statis (CSS, gambar, dll.)
├── components/       # Komponen Vue
├── lib/              # Library utilitas
├── pages/            # Halaman aplikasi
├── prisma/           # Skema database dan migrasi
├── server/           # API routes sisi server
└── types/            # Definisi tipe TypeScript
```

## Basis Data

Proyek ini menggunakan Mysql untuk pengembangan dengan Prisma sebagai ORM. Basis data mencakup:

- **Users**: Manajemen pengguna dengan email dan nama
- **Posts**: Postingan blog dengan judul, konten, dan status publikasi

## API Routes

- `GET /api/users` - Mendapatkan semua pengguna
- `POST /api/users` - Membuat pengguna baru
- `GET /api/stats` - Mendapatkan statistik aplikasi

## Teknologi yang Digunakan

- **Framework**: Nuxt 3
- **UI Library**: Nuxt UI (Tailwind CSS + HeadlessUI)
- **Database**: Mysql + Prisma ORM
- **TypeScript**: Dukungan tipe penuh
- **Icons**: Heroicons
- **Styling**: Tailwind CSS

## Variabel Lingkungan

Buat file `.env` di direktori root:

```env
DATABASE_URL=mysql://root@localhost:3306/lsp_digital
```

## Kontribusi

1. Fork repositori ini
2. Buat branch fitur Anda (`git checkout -b fitur/fitur-keren`)
3. Commit perubahan Anda (`git commit -m 'Tambah fitur keren'`)
4. Push ke branch (`git push origin fitur/fitur-keren`)
5. Buka Pull Request

## Komit Semantik

Pesan komit semantik membantu mendeskripsikan tujuan perubahan secara standar, sehingga riwayat proyek lebih mudah dipahami.

| Tipe     | Kegunaan                                               |
|----------|--------------------------------------------------------|
| feat     | Penambahan fitur baru                                  |
| fix      | Memperbaiki bug                                        |
| docs     | Perubahan dokumentasi saja                             |
| style    | Perubahan format/penulisan kode tanpa mengubah logika  |
| refactor | Refactor kode tanpa menambah fitur atau memperbaiki bug|
| perf     | Peningkatan performa                                   |
| test     | Menambah/memperbaiki pengujian                         |
| chore    | Perubahan lain yang tidak mempengaruhi kode produksi   |

Contoh:  
`feat: tambah halaman login`  
`fix: perbaiki error pada validasi email`  
`docs: perbarui dokumentasi README`  
`style: format kode dengan Prettier`  
`refactor: refactor fungsi autentikasi`  
`perf: optimalkan query database`  
`test: tambah unit test untuk komponen`  
`chore: update dependensi`


## Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT.

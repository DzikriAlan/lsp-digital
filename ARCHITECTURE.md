# LSP Digital - Overview Arsitektur (Versi Gen Z)

## Struktur Folder

Projek ini udah dipisah-pisah biar tim frontend sama backend bisa ngoding tanpa ribet, jadi makin gampang maintain-nya.

```
lsp-digital/
├── frontend/                 # Buat tampilan user, bro
│   ├── shared/              # Resource yang dipake bareng
│   │   ├── assets/          # Asset statis (CSS, gambar, dsb)
│   │   └── components/      # Komponen Vue yang bisa dipake ulang
│   ├── features/            # Komponen & logic per fitur
│   └── pages/               # Halaman-halaman Nuxt.js
├── backend/                 # Buat urusan server & database
│   ├── database/            # Setup database & migrasi
│   ├── lib/                 # Utility & config backend
│   ├── prisma/              # Schema Prisma & file terkait
│   ├── scripts/             # Script buat database & utilitas
│   └── server/              # Route API & logic server
├── docs/                    # Dokumentasi projek
├── app.vue                  # Komponen utama Nuxt.js
├── nuxt.config.ts           # Konfigurasi Nuxt.js
└── package.json             # Dependency & script projek
```

## Cara Ngembangin Projek

### Ngoding Frontend
- Fokus aja di folder `frontend/`
- Komponen yang sering dipake ada di `frontend/shared/components/`
- Halaman-halaman ada di `frontend/pages/`
- Kode per fitur taruh di `frontend/features/`

### Ngoding Backend
- Fokus di folder `backend/`
- Route API ada di `backend/server/api/`
- Konfigurasi database di `backend/lib/`
- Script database di `backend/scripts/`

## Perubahan Konfigurasi Penting

1. **Konfigurasi Nuxt.js** (`nuxt.config.ts`):
   - Folder pages: `frontend/pages`
   - Folder komponen: `frontend/shared/components`
   - Folder assets: `frontend/shared/assets`
   - Folder server: `backend/server`

2. **Script di Package.json**:
   - Script database sekarang pake `backend/prisma/schema.prisma`
   - Semua perintah Prisma pake flag `--schema`

3. **Import Path**:
   - File API backend import dari `~/backend/lib/prisma`
   - Frontend pake auto-import Nuxt.js kayak biasa

## Cara Jalanin Projek

```bash
# Mode development
npm run dev

# Operasi database
npm run db:generate    # Generate Prisma client
npm run db:push        # Push schema ke database
npm run db:studio      # Buka Prisma Studio
npm run db:seed        # Isi database pake data dummy

# Build
npm run build
```

## Keuntungan Arsitektur Ini

1. **Pisah Jelas**: Frontend sama backend gak nyampur, jadi enak
2. **Kerja Tim Makin Gampang**: Tim bisa fokus di bagian masing-masing
3. **Mudah Di-maintain**: Cari & ubah kode gampang banget
4. **Bisa Di-scale**: Struktur siap buat projek makin gede
5. **Fitur Rapi**: Fitur bisa diatur di folder `frontend/features/`

## Catatan Migrasi

- Semua path file udah diupdate sesuai struktur baru
- Konfigurasi Prisma sekarang pake path schema backend
- Auto-import komponen masih jalan lewat Nuxt.js config
- Route API tetep bisa diakses kayak biasa

# LSP Digital 🚀

Web app kekinian, dibikin pake Nuxt 3, Shadcn/UI, sama Prisma. Pokoknya vibes-nya modern abis, cocok buat anak muda yang suka ngoding sambil ngopi ☕.

## Fitur Kece

- 🚀 **Nuxt 3** - biar makin ngebut
- 🎨 **Nuxt UI** - UI cakep, auto ganteng
- 🗄️ **Prisma** - ORM biar ga ribet ngurus database
- 🌙 **Dark Mode** - biar mata ga silau pas ngoding malem
- 📱 **Responsif** - buka di HP, tablet, PC, semua bisa!
- 🔧 **TypeScript** - anti typo club

## Syarat Wajib Biar Ga Error

- Node.js v20.19.0 ke atas (jangan yang jadul ya)
- Mysql v5.7.33-win32 (biar nyambung sama Prisma)
- Laragon php-8.1.10 (buat yang suka ngoprek)
- npm atau yarn (pilih salah satu, jangan dua-duanya ya bestie)

## Cara Instalasi (Biar Ga Bingung)

1. **Install dulu dependensinya:**
   ```bash
   npm install
   ```

2. **Setup database, biar datanya ga ngawang:**
   ```bash
   # Generate Prisma client (biar bisa connect ke DB)
   npm run db:generate

   # Push skema ke database (biar tabelnya auto jadi)
   npm run db:push

   # Seed database sama data contoh (biar ga kosong)
   npm run db:seed
   ```

3. **Jalankan server development:**
   ```bash
   npm run dev
   ```

4. **Langsung buka browser ke:** `http://localhost:3000` (jangan lupa nyalain servernya ya!)

## Skrip yang Bisa Dipake

- `npm run dev` - Buat ngembangin, auto reload
- `npm run build` - Build buat production, siap deploy
- `npm run preview` - Liat hasil build sebelum upload
- `npm run db:push` - Sync skema ke database
- `npm run db:studio` - Buka Prisma Studio, UI buat database
- `npm run db:migrate` - Migrasi database, biar update
- `npm run db:generate` - Generate Prisma client
- `npm run db:seed` - Isi database sama data contoh

## Database-nya

Pake Mysql + Prisma, jadi gampang banget buat CRUD

## API Route (Biar Bisa Mainan API)

## Stack Teknologi

- **Framework**: Nuxt 3 (modern abis)
- **UI Library**: Nuxt UI (Tailwind CSS + HeadlessUI)
- **Database**: Mysql + Prisma ORM
- **TypeScript**: Full support, anti typo
- **Icons**: Heroicons, biar makin kece
- **Styling**: Tailwind CSS, tinggal custom

## Setting .env (Biar Aman)

Bikin file `.env` di root project, isinya:

```env
DATABASE_URL=mysql://root@localhost:3306/lsp_digital
```

## Mau Ikutan Kontribusi? Gaskeun!

1. Fork repo ini dulu
2. Bikin branch baru (`git checkout -b fitur/fitur-keren`)
3. Commit perubahan lo (`git commit -m 'Tambah fitur keren'`)
4. Push ke branch (`git push origin fitur/fitur-keren`)
5. Buka Pull Request, nanti kita review bareng

## Komit Semantik (Biar Ga Bingung History-nya)

Pake format komit yang jelas, biar tim ga pusing bacanya:

| Tipe     | Kegunaan                                               |
|----------|--------------------------------------------------------|
| feat     | Nambahin fitur baru                                    |
| fix      | Benerin bug                                            |
| docs     | Update dokumentasi doang                               |
| style    | Ganti format/rapihin kode, ga ngubah logic            |
| refactor | Refactor kode, ga nambah fitur/bugfix                  |
| perf     | Bikin performa makin ngebut                            |
| test     | Tambah/perbaiki testing                                |
| chore    | Update hal lain, ga ngaruh ke kode produksi            |

Contoh:  
`feat: tambah halaman login`  
`fix: perbaiki error validasi email`  
`docs: update README`  
`style: format kode pake Prettier`  
`refactor: refactor fungsi auth`  
`perf: optimalkan query DB`  
`test: tambah unit test komponen`  
`chore: update dependency`


## Lisensi

Santai aja, project ini open source kok, pake MIT License. Silakan dipake, jangan lupa kasih bintang kalau suka! ⭐

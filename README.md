# LSP Digital

A modern web application built with Nuxt 3, Shadcn/UI, and Prisma.

## Features

- 🚀 **Nuxt 3** - The Intuitive Vue Framework
- 🎨 **Nuxt UI** - Beautiful and accessible UI components built with Tailwind CSS
- 🗄️ **Prisma** - Next-generation ORM for Node.js and TypeScript
- 🌙 **Dark Mode** - Built-in dark mode support
- 📱 **Responsive** - Mobile-first responsive design
- 🔧 **TypeScript** - Full TypeScript support

## Prerequisites

- Node.js v20.19.0 or higher
- npm or yarn

## Quick Start

1. **Install dependencies:**
   ```bash
   npm install
   ```

2. **Set up the database:**
   ```bash
   # Generate Prisma client
   npm run db:generate
   
   # Push the schema to database
   npm run db:push
   
   # Seed the database with sample data
   npm run db:seed
   ```

3. **Start the development server:**
   ```bash
   npm run dev
   ```

4. **Open your browser and visit:** `http://localhost:3000`

## Available Scripts

- `npm run dev` - Start development server
- `npm run build` - Build for production
- `npm run preview` - Preview production build
- `npm run db:push` - Push database schema
- `npm run db:studio` - Open Prisma Studio
- `npm run db:migrate` - Run database migrations
- `npm run db:generate` - Generate Prisma client
- `npm run db:seed` - Seed database with sample data

## Project Structure

```
├── assets/           # Static assets (CSS, images, etc.)
├── components/       # Vue components
├── lib/             # Utility libraries
├── pages/           # Application pages
├── prisma/          # Database schema and migrations
├── server/          # Server-side API routes
└── types/           # TypeScript type definitions
```

## Database

This project uses SQLite for development with Prisma as the ORM. The database includes:

- **Users**: User management with email and name
- **Posts**: Blog posts with title, content, and publish status

## API Routes

- `GET /api/users` - Get all users
- `POST /api/users` - Create a new user
- `GET /api/stats` - Get application statistics

## Tech Stack

- **Framework**: Nuxt 3
- **UI Library**: Nuxt UI (Tailwind CSS + HeadlessUI)
- **Database**: SQLite + Prisma ORM
- **TypeScript**: Full type safety
- **Icons**: Heroicons
- **Styling**: Tailwind CSS

## Environment Variables

Create a `.env` file in the root directory:

```env
DATABASE_URL="file:./dev.db"
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License.

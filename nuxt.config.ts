export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
    '@nuxt/ui',
    '@vueuse/nuxt',
    '@nuxt/eslint'
  ],
  css: ['~/frontend/shared/assets/css/main.css'],
  dir: {
    pages: 'frontend/pages',
    assets: 'frontend/shared/assets'
  },
  serverDir: 'backend/server',
  srcDir: '.',
  components: [
    {
      path: '~/frontend/shared/components',
      pathPrefix: false
    }
  ],
  colorMode: {
    preference: 'system'
  },
  ui: {
    global: true
  },
  runtimeConfig: {
    // Private keys (only available on server-side)
    databaseUrl: process.env.DATABASE_URL,
    // Public keys (exposed to client-side)
    public: {
      apiBase: '/api'
    }
  },
  nitro: {
    experimental: {
      wasm: true
    },
    storage: {
      redis: {
        driver: 'memory'
      }
    },
    rollupConfig: {
      external: (id) => {
        return id.includes('@prisma/client') || id.includes('.prisma')
      }
    }
  },
  vite: {
    optimizeDeps: {
      exclude: ['@prisma/client']
    },
    define: {
      global: 'globalThis'
    }
  }
})

export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
    '@nuxt/ui',
    '@vueuse/nuxt',
    '@nuxt/eslint'
  ],
  css: ['~/assets/css/main.css'],
  colorMode: {
    preference: 'system'
  },
  ui: {
    global: true,
    icons: ['heroicons', 'simple-icons']
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
    }
  }
})

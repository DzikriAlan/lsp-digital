<template>
  <header class="bg-white dark:bg-gray-900 shadow-sm border-b">
    <nav class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
          <h1 class="text-xl font-bold text-gray-900 dark:text-white">
            LSP Digital
          </h1>
        </div>
        
        <div class="flex items-center space-x-4">
          <UButton
            :icon="isDark ? 'i-heroicons-sun' : 'i-heroicons-moon'"
            variant="ghost"
            @click="toggleColorMode"
          />
          
          <UDropdown :items="menuItems">
            <UButton
              icon="i-heroicons-bars-3"
              variant="ghost"
            />
          </UDropdown>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup lang="ts">
const colorMode = useColorMode()
const isDark = computed(() => colorMode.value === 'dark')

const toggleColorMode = () => {
  colorMode.preference = isDark.value ? 'light' : 'dark'
}

const menuItems = [
  [
    {
      label: 'Home',
      icon: 'i-heroicons-home',
      to: '/'
    },
    {
      label: 'Users',
      icon: 'i-heroicons-users',
      to: '/users'
    },
    {
      label: 'Posts',
      icon: 'i-heroicons-document-text',
      to: '/posts'
    }
  ]
]
</script>

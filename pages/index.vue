<template>
  <div class="space-y-8">
    <div class="text-center">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
        Welcome to LSP Digital
      </h1>
      <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
        A modern web application built with Nuxt 3, Shadcn/UI, and Prisma
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <UCard>
        <template #header>
          <div class="flex items-center space-x-2">
            <UIcon name="i-heroicons-users" class="w-5 h-5" />
            <h3 class="font-semibold">Users</h3>
          </div>
        </template>
        
        <p class="text-gray-600 dark:text-gray-300 mb-4">
          Manage your users and their information
        </p>
        
        <UButton to="/users" color="primary">
          View Users
        </UButton>
      </UCard>

      <UCard>
        <template #header>
          <div class="flex items-center space-x-2">
            <UIcon name="i-heroicons-document-text" class="w-5 h-5" />
            <h3 class="font-semibold">Posts</h3>
          </div>
        </template>
        
        <p class="text-gray-600 dark:text-gray-300 mb-4">
          Create and manage blog posts
        </p>
        
        <UButton to="/posts" color="primary">
          View Posts
        </UButton>
      </UCard>

      <UCard>
        <template #header>
          <div class="flex items-center space-x-2">
            <UIcon name="i-heroicons-cog-6-tooth" class="w-5 h-5" />
            <h3 class="font-semibold">API</h3>
          </div>
        </template>
        
        <p class="text-gray-600 dark:text-gray-300 mb-4">
          RESTful API powered by Prisma
        </p>
        
        <UButton to="/api/users" external color="primary">
          View API
        </UButton>
      </UCard>
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6">
      <h2 class="text-2xl font-semibold mb-4">Quick Stats</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg">
          <div class="text-2xl font-bold text-blue-600">{{ stats.users }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-300">Total Users</div>
        </div>
        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg">
          <div class="text-2xl font-bold text-green-600">{{ stats.posts }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-300">Total Posts</div>
        </div>
        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg">
          <div class="text-2xl font-bold text-purple-600">{{ stats.published }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-300">Published Posts</div>
        </div>
        <div class="bg-white dark:bg-gray-700 p-4 rounded-lg">
          <div class="text-2xl font-bold text-yellow-600">{{ stats.drafts }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-300">Draft Posts</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
interface Stats {
  users: number
  posts: number
  published: number
  drafts: number
}

const { data: stats } = await useFetch<Stats>('/api/stats', {
  default: () => ({
    users: 0,
    posts: 0,
    published: 0,
    drafts: 0
  })
})
</script>

<template>
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
        Users
      </h1>
      <UButton
        icon="i-heroicons-plus"
        @click="showCreateModal = true"
      >
        Add User
      </UButton>
    </div>

    <div v-if="pending" class="flex justify-center">
      <USpinner size="lg" />
    </div>

    <div v-else-if="error" class="text-center text-red-600">
      {{ error }}
    </div>

    <div v-else-if="users?.length === 0" class="text-center text-gray-500">
      No users found
    </div>

    <div v-else class="grid gap-6">
      <UCard v-for="user in users" :key="user.id">
        <template #header>
          <div class="flex items-center justify-between">
            <div>
              <h3 class="font-semibold text-lg">{{ user.name || 'Unnamed User' }}</h3>
              <p class="text-gray-600 dark:text-gray-300">{{ user.email }}</p>
            </div>
            <div class="text-sm text-gray-500">
              {{ user.posts.length }} posts
            </div>
          </div>
        </template>
        
        <div class="space-y-2">
          <div class="text-sm">
            <span class="font-medium">Created:</span>
            {{ formatDate(user.createdAt) }}
          </div>
          <div class="text-sm">
            <span class="font-medium">Last updated:</span>
            {{ formatDate(user.updatedAt) }}
          </div>
        </div>
      </UCard>
    </div>

    <!-- Create User Modal -->
    <UModal v-model="showCreateModal">
      <UCard>
        <template #header>
          <h3 class="text-lg font-semibold">Create New User</h3>
        </template>
        
        <form @submit.prevent="createUser" class="space-y-4">
          <UFormGroup label="Name">
            <UInput
              v-model="newUser.name"
              placeholder="Enter user name"
            />
          </UFormGroup>
          
          <UFormGroup label="Email" required>
            <UInput
              v-model="newUser.email"
              type="email"
              placeholder="Enter email address"
              required
            />
          </UFormGroup>
          
          <div class="flex justify-end space-x-2">
            <UButton
              variant="ghost"
              @click="showCreateModal = false"
            >
              Cancel
            </UButton>
            <UButton
              type="submit"
              :loading="creating"
            >
              Create User
            </UButton>
          </div>
        </form>
      </UCard>
    </UModal>
  </div>
</template>

<script setup lang="ts">
interface User {
  id: string
  email: string
  name: string | null
  createdAt: string
  updatedAt: string
  posts: any[]
}

const showCreateModal = ref(false)
const creating = ref(false)
const newUser = ref({
  name: '',
  email: ''
})

const { data: users, pending, error, refresh } = await useFetch<User[]>('/api/users')

const formatDate = (dateString: string) => {
  return new Date(dateString).toLocaleDateString()
}

const createUser = async () => {
  if (!newUser.value.email) return
  
  creating.value = true
  
  try {
    await $fetch('/api/users', {
      method: 'POST',
      body: newUser.value
    })
    
    // Reset form
    newUser.value = { name: '', email: '' }
    showCreateModal.value = false
    
    // Refresh the users list
    await refresh()
  } catch (error) {
    console.error('Failed to create user:', error)
  } finally {
    creating.value = false
  }
}
</script>

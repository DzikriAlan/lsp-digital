<template>
  <div class="space-y-6">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
        Blog Posts
      </h1>
      <UButton
        icon="i-heroicons-plus"
        @click="showCreateModal = true"
      >
        Add Post
      </UButton>
    </div>

    <div v-if="pending" class="flex justify-center">
      <USpinner size="lg" />
    </div>

    <div v-else-if="error" class="text-center text-red-600">
      {{ error }}
    </div>

    <div v-else-if="posts?.length === 0" class="text-center text-gray-500">
      No posts found
    </div>

    <div v-else class="grid gap-6">
      <UCard v-for="post in posts" :key="post.id">
        <template #header>
          <div class="flex items-center justify-between">
            <div>
              <h3 class="font-semibold text-lg">{{ post.title }}</h3>
              <p class="text-gray-600 dark:text-gray-300">
                by {{ post.author.name || post.author.email }}
              </p>
            </div>
            <UBadge 
              :color="post.published ? 'green' : 'yellow'"
              variant="subtle"
            >
              {{ post.published ? 'Published' : 'Draft' }}
            </UBadge>
          </div>
        </template>
        
        <div class="space-y-2">
          <p class="text-gray-700 dark:text-gray-200">
            {{ post.content || 'No content...' }}
          </p>
          <div class="text-sm text-gray-500">
            <span class="font-medium">Created:</span>
            {{ formatDate(post.createdAt) }}
          </div>
        </div>
      </UCard>
    </div>

    <!-- Create Post Modal -->
    <UModal v-model="showCreateModal">
      <UCard>
        <template #header>
          <h3 class="text-lg font-semibold">Create New Post</h3>
        </template>
        
        <form @submit.prevent="createPost" class="space-y-4">
          <UFormGroup label="Title" required>
            <UInput
              v-model="newPost.title"
              placeholder="Enter post title"
              required
            />
          </UFormGroup>
          
          <UFormGroup label="Content">
            <UTextarea
              v-model="newPost.content"
              placeholder="Enter post content"
              rows="4"
            />
          </UFormGroup>

          <UFormGroup label="Author" required>
            <USelect
              v-model="newPost.authorId"
              :options="userOptions"
              option-attribute="label"
              value-attribute="value"
              placeholder="Select author"
              required
            />
          </UFormGroup>
          
          <UFormGroup>
            <UCheckbox
              v-model="newPost.published"
              label="Published"
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
              Create Post
            </UButton>
          </div>
        </form>
      </UCard>
    </UModal>
  </div>
</template>

<script setup lang="ts">
interface Post {
  id: string
  title: string
  content: string | null
  published: boolean
  authorId: string
  author: {
    id: string
    name: string | null
    email: string
  }
  createdAt: string
  updatedAt: string
}

interface User {
  id: string
  name: string | null
  email: string
}

const showCreateModal = ref(false)
const creating = ref(false)
const newPost = ref({
  title: '',
  content: '',
  authorId: '',
  published: false
})

const { data: posts, pending, error, refresh } = await useFetch<Post[]>('/api/posts')
const { data: users } = await useFetch<User[]>('/api/users')

const userOptions = computed(() => {
  return users.value?.map(user => ({
    label: user.name || user.email,
    value: user.id
  })) || []
})

const formatDate = (dateString: string) => {
  return new Date(dateString).toLocaleDateString()
}

const createPost = async () => {
  if (!newPost.value.title || !newPost.value.authorId) return
  
  creating.value = true
  
  try {
    await $fetch('/api/posts', {
      method: 'POST',
      body: newPost.value
    })
    
    // Reset form
    newPost.value = { title: '', content: '', authorId: '', published: false }
    showCreateModal.value = false
    
    // Refresh the posts list
    await refresh()
  } catch (error) {
    console.error('Failed to create post:', error)
  } finally {
    creating.value = false
  }
}
</script>

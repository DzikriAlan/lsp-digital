import prisma from '~/backend/lib/prisma'

export default defineEventHandler(async (event) => {
  try {
    const usersCount = await prisma.user.count()
    const postsCount = await prisma.post.count()
    const publishedCount = await prisma.post.count({
      where: { published: true }
    })
    const draftsCount = await prisma.post.count({
      where: { published: false }
    })
    
    return {
      users: usersCount,
      posts: postsCount,
      published: publishedCount,
      drafts: draftsCount
    }
  } catch (error) {
    throw createError({
      statusCode: 500,
      statusMessage: 'Failed to fetch stats'
    })
  }
})

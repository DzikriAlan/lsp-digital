import prisma from '~/lib/prisma'

export default defineEventHandler(async (event) => {
  try {
    const posts = await prisma.post.findMany({
      include: {
        author: true
      },
      orderBy: {
        createdAt: 'desc'
      }
    })
    
    return posts
  } catch (error) {
    throw createError({
      statusCode: 500,
      statusMessage: 'Failed to fetch posts'
    })
  }
})

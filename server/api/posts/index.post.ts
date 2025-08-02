import prisma from '~/lib/prisma'

export default defineEventHandler(async (event) => {
  try {
    const body = await readBody(event)
    
    const post = await prisma.post.create({
      data: {
        title: body.title,
        content: body.content,
        published: body.published || false,
        authorId: body.authorId
      },
      include: {
        author: true
      }
    })
    
    return post
  } catch (error) {
    throw createError({
      statusCode: 500,
      statusMessage: 'Failed to create post'
    })
  }
})

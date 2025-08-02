import prisma from '~/lib/prisma'

export default defineEventHandler(async (event) => {
  try {
    const body = await readBody(event)
    
    const user = await prisma.user.create({
      data: {
        email: body.email,
        name: body.name
      }
    })
    
    return user
  } catch (error) {
    throw createError({
      statusCode: 500,
      statusMessage: 'Failed to create user'
    })
  }
})

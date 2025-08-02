import { PrismaClient } from '@prisma/client'

const prisma = new PrismaClient()

async function main() {
  // Create a sample user
  const user = await prisma.user.create({
    data: {
      email: 'john@example.com',
      name: 'John Doe',
      posts: {
        create: [
          {
            title: 'Hello World',
            content: 'This is my first post!',
            published: true,
          },
          {
            title: 'Draft Post',
            content: 'This is a draft post.',
            published: false,
          },
        ],
      },
    },
  })

  console.log('Created user:', user)
}

main()
  .catch((e) => {
    console.error(e)
    process.exit(1)
  })
  .finally(async () => {
    await prisma.$disconnect()
  })

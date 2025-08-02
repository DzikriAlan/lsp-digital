import mysql from 'mysql2/promise'

async function createDatabase() {
  try {
    console.log('🗂️  Creating MySQL database...')
    
    // Connect without specifying database
    const baseUrl = process.env.DATABASE_URL?.replace('/lsp_digital', '') || 'mysql://root:@localhost:3306'
    console.log('📍 Connecting to MySQL server...')
    
    const connection = await mysql.createConnection(baseUrl)
    
    // Create database
    await connection.execute('CREATE DATABASE IF NOT EXISTS lsp_digital CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci')
    console.log('✅ Database "lsp_digital" created successfully!')
    
    // Close connection
    await connection.end()
    
  } catch (error: any) {
    console.error('❌ Failed to create database:')
    console.error(error.message)
    process.exit(1)
  }
}

createDatabase()

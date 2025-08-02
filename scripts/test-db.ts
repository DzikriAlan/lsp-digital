import mysql from 'mysql2/promise'

async function testConnection() {
  try {
    console.log('🔗 Testing MySQL connection...')
    
    // Parse DATABASE_URL
    const dbUrl = process.env.DATABASE_URL || 'mysql://root:@localhost:3306/lsp_digital'
    console.log('📍 Database URL:', dbUrl.replace(/\/\/.*@/, '//***@'))
    
    // Create connection
    const connection = await mysql.createConnection(dbUrl)
    
    // Test query
    const [rows] = await connection.execute('SELECT 1 as test')
    console.log('✅ Connection successful!')
    console.log('📊 Test query result:', rows)
    
    // Close connection
    await connection.end()
    
  } catch (error) {
    console.error('❌ Connection failed:')
    console.error(error.message)
    
    if (error.code === 'ECONNREFUSED') {
      console.log('\n💡 Troubleshooting tips:')
      console.log('- Make sure MySQL service is running')
      console.log('- Check if port 3306 is accessible')
      console.log('- Verify MySQL is installed')
    } else if (error.code === 'ER_DBACCESS_DENIED_ERROR') {
      console.log('\n💡 Database access denied:')
      console.log('- Check username/password in DATABASE_URL')
      console.log('- Verify user has access to the database')
    } else if (error.code === 'ER_BAD_DB_ERROR') {
      console.log('\n💡 Database not found:')
      console.log('- Create database: CREATE DATABASE lsp_digital;')
      console.log('- Run: npm run db:create-database')
    }
    
    process.exit(1)
  }
}

testConnection()

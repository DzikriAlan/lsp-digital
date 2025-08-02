# MySQL Database Setup

## Prerequisites

Make sure you have MySQL installed on your system. You can download it from:
- [MySQL Community Server](https://dev.mysql.com/downloads/mysql/)
- Or use XAMPP/WAMP which includes MySQL

## Setup Instructions

### 1. Start MySQL Service

Make sure MySQL service is running on your system.

**Windows (XAMPP):**
- Start XAMPP Control Panel
- Start Apache and MySQL services

**Windows (Standalone MySQL):**
```bash
net start mysql
```

### 2. Create Database

Login to MySQL and create the database:

```sql
mysql -u root -p
```

Then run:
```sql
CREATE DATABASE lsp_digital;
EXIT;
```

### 3. Configure Environment

Update your `.env` file with your MySQL credentials:
```env
DATABASE_URL="mysql://username:password@localhost:3306/lsp_digital"
```

Default for XAMPP: `mysql://root:@localhost:3306/lsp_digital`

### 4. Run Database Migration

```bash
npm run db:push
npm run db:seed
```

## Troubleshooting

### Connection Issues
1. Check if MySQL service is running
2. Verify username/password in DATABASE_URL
3. Ensure database `lsp_digital` exists
4. Check if port 3306 is available

### Common DATABASE_URL formats:
- XAMPP: `mysql://root:@localhost:3306/lsp_digital`
- MySQL with password: `mysql://root:password@localhost:3306/lsp_digital`
- Custom port: `mysql://root:password@localhost:3307/lsp_digital`

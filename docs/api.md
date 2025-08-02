# API Documentation

## Endpoints

### Users

#### GET /api/users
Returns all users with their posts.

**Response:**
```json
[
  {
    "id": "string",
    "email": "string",
    "name": "string|null",
    "createdAt": "string",
    "updatedAt": "string",
    "posts": [...]
  }
]
```

#### POST /api/users
Creates a new user.

**Request Body:**
```json
{
  "email": "string",
  "name": "string?"
}
```

### Posts

#### GET /api/posts
Returns all posts with their authors.

**Response:**
```json
[
  {
    "id": "string",
    "title": "string",
    "content": "string|null",
    "published": "boolean",
    "authorId": "string",
    "author": {
      "id": "string",
      "name": "string|null",
      "email": "string"
    },
    "createdAt": "string",
    "updatedAt": "string"
  }
]
```

#### POST /api/posts
Creates a new post.

**Request Body:**
```json
{
  "title": "string",
  "content": "string?",
  "published": "boolean?",
  "authorId": "string"
}
```

### Stats

#### GET /api/stats
Returns application statistics.

**Response:**
```json
{
  "users": "number",
  "posts": "number",
  "published": "number",
  "drafts": "number"
}
```

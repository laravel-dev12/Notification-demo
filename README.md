# Laravel Project Setup

This guide will help you set up the Laravel project, perform database migrations, and seed the database with initial data.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:

- PHP >= 7.3
- Composer
- MySQL or any other database supported by Laravel
- Git (optional)

## Getting Started

### 1. Clone the Repository

If you haven't already cloned the repository, do so by running:

```bash
git clone https://github.com/laravel-dev12/Notification-demo.git
cd your-laravel-project
```

### 2. Install Dependencies

Install the project dependencies using Composer:

```bash
composer install
```

### 3. Environment Configuration
Copy the .env.example file to .env and configure your environment variables. You can do this manually or by running the following command:

```bash
cp .env.example .env
```

Open the .env file and update the necessary environment variables, particularly the database settings:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations
Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```
### 6. Seed the Database
Seed the database with initial data:

```bash
php artisan db:seed
```

### 7. Running the Application

Start the Laravel development server:
```bash
php artisan serve
```
Visit http://localhost:8000 in your browser to see the application in action.
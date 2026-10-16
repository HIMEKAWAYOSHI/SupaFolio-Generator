# SupaFolio - Portfolio Generator

SupaFolio is a web-based portfolio generator that helps users create and showcase their personal information, education, skills, projects, and work experience.

## Features

- User registration and login
- Create and manage multiple portfolios
- Three portfolio templates: Simple, Modern, and Creative
- Portfolio preview and editing
- Portfolio data stored in Supabase PostgreSQL
- Image storage through Supabase Storage

## Technologies Used

- Laravel
- PHP
- HTML, CSS, and JavaScript
- Supabase PostgreSQL
- Supabase Storage

## Setup

1. Clone the repository.
2. Run `composer install`.
3. Copy `.env.example` to `.env`.
4. Configure your database and Supabase environment variables in `.env`.
5. Run `php artisan key:generate`.
6. Configure the required database tables and Supabase Storage bucket.
7. Run `php artisan serve`.

**Note:** Never commit your real `.env` file or private credentials to GitHub.
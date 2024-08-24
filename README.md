# URL Shortener

## Overview

This project is a URL shortening service built with Laravel 11. It features a role and permission system, user authentication, and API endpoints for both URL shortening and authentication. The project also includes API documentation.

## Features

-   URL Shortening Service
-   Role-Based Access Control (RBAC)
-   API Authentication (Laravel Sanctum)
-   API for URL Shortening
-   API Documentation at `/api/documentation`

## Prerequisites

-   PHP >= 8.x
-   Composer
-   MySQL

## Installation

#### Clone the project

```bash
git clone https://github.com/Mahbubul-Hasan/Url-Shorter.git
cd Url-Shorter
```

#### Install dependencies

```bash
composer install
```

#### Set up the environment

Copy the `.env.example` to `.env` and configure your environment variables

```bash
cp .env.example .env
```

#### Generate application key

```bash
php artisan key:generate
```

#### Migrate the database with seeding

Run the migrations and seed the database to create the necessary tables and default roles/permissions.

```bash
php artisan migrate --seed
```

#### Link the storage directory

```bash
php artisan storage:link
```

#### Set up queues

Ensure you have a queue worker running for handling background jobs, such as URL processing. You can start a queue worker using:

```bash
php artisan queue:work
```

#### Schedule tasks

The project requires a scheduled task to run every 6 hours to soft-delete expired URLs. You can set this up in your server's cron job:

```bash
php artisan schedule:work
```

## Running the Project

```bash
php artisan serve
```

## Usage

### URL Shortener

You can create shortened URLs through the application interface or via the API.

### API Documentation

Detailed API documentation is available at:

```bash
https://your_domain/api/documentation
```

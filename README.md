# URL Shortener

## Overview

This project is a URL shortening service built with Laravel. It features a role and permission system, user authentication, and API endpoints for both URL shortening and authentication. The project also includes API documentation.

## Features

-   URL Shortener: Generate short URLs for longer links.
-   Role and Permission System: Manage user roles and permissions with ease.
-   Scheduled Task: Soft-deletes expired URLs every 6 hours.
-   API Authentication: Secure API endpoints with Laravel Sanctum.
-   API Documentation: Access detailed API documentation at `/api/documentation`

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

To start the application locally, use the following command:

```bash
php artisan serve
```

Ensure your queue worker is running and that the scheduled task is set up for soft-deleting expired URLs.

## Usage

### URL Shortener

You can create shortened URLs through the application interface or via the API.

### API Documentation

Detailed API documentation is available at:

```bash
https://your_domain/api/documentation
```

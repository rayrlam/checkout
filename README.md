# Laravel Testing: A Collection of Technical Tests (2022-Present)

![Laravel](https://img.shields.io/badge/Laravel-^11.23.5-blue)
![PHP](https://img.shields.io/badge/PHP-^8.3.11-yellow)
![License](https://img.shields.io/badge/license-MIT-green)

This repository serves as a comprehensive collection of Laravel testing techniques and best practices, compiled from various technical tests and real-world scenarios encountered since 2022. It aims to provide developers with practical examples and insights into effective testing strategies for Laravel applications.

### Key Features:

1. **Unit Tests**: Demonstrates isolated testing of individual components, functions, and methods.
2. **API Tests**: Provides examples of testing RESTful API endpoints and responses.
3. **Browser Tests**: Includes Laravel Dusk examples for frontend and JavaScript testing.
4. **Database Testing**: Covers strategies for testing database interactions and migrations.
5. **Test-Driven Development (TDD) Examples**: Shows the TDD approach in action with Laravel.

### Structure:

- `/tests`: Contains all test files organized by type (Unit, Browser, etc.)
- `/database`: Contains database migrations and seeders used in tests
- `/app`: Includes the Laravel application code being tested
- `/app/Http/Controllers`: Houses the application's controllers for the Technical Tests
- `/app/Helpers`: Contains helper functions and classes used across the application

### Resources:

- [Laravel Testing Documentation](https://laravel.com/docs/testing)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [Laravel Dusk Documentation](https://laravel.com/docs/dusk)

## Prerequisites

- Git
- Docker
- Docker Compose
- PHP 8.3 or higher
- Composer
- Node.js and npm (for React testing)

## Installation

- Clone the repository with submodules:
    ```
    git clone --recurse-submodules https://github.com/rayrlam/testing-playground.git

    cd testing-playground
    ```

- If you've already cloned the project and want to load submodules:
    ```
    git submodule update --init --recursive
    ```

### Setup

- Navigate to the Laravel testing directory:
    ```
    cd laravel-testing
    ```
- Copy the `.env.example` file to `.env`:
    ```
    cp .env.example .env
    ```
## Install dependencies:

```
composer install
```
- Start the Docker environment:
    ```
    ./vendor/bin/sail up -d
    ```
- Generate application key:
    ```
    ./vendor/bin/sail artisan key:generate
    ```
- Run migrations:
    ```
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail artisan db:seed
    ```
### Testing

- Laravel Dusk
    ```
    ./vendor/bin/sail dusk
    ```
- PHPUnit
    ```
    ./vendor/bin/sail test
    ```
- Access the Laravel application at `http://127.0.0.1/`

### Contributing:

We welcome contributions! If you have additional test examples, improvements, or bug fixes, please feel free to submit a pull request.

### License:

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Laravel Testing
![Laravel](https://img.shields.io/badge/Laravel-^11.22.0-blue)
![PHP](https://img.shields.io/badge/PHP-^8.2.23-yellow)
![License](https://img.shields.io/badge/license-MIT-green)

This repository of testing playground contains multiple submodules, including this Laravel testing environment.

## Prerequisites

- Git
- Docker
- Docker Compose
- PHP 8.2 or higher
- Composer
- Node.js and npm (for React testing)

## Installation

- Clone the repository with submodules:
```
    git clone --recurse-submodules https://github.com/your-username/testing-playground.git

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
```
- Access the Laravel application at `http://127.0.0.1/`
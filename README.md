# Employee Report Management System

## Overview

This project is an Employee Report Management System built using Laravel. It allows employees to register, log in, and submit reports, while administrators can manage employees, reports, and their statuses.

## Features

-   Employee registration and authentication
-   Admin authentication and dashboard
-   Department-wise employee management
-   Employee report submission with image upload
-   Report status management (Pending, Approved, Rejected)
-   Pagination for reports listing

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/anasmelila/pharma.git
    cd your-project-folder
    ```
2. Install dependencies:
    ```sh
    composer install
    ```
3. Create a `.env` file:
    ```sh
    cp .env.example .env
    ```
4. Generate an application key:
    ```sh
    php artisan key:generate
    ```
5. Configure the database in `.env` file:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```
6. Run database migrations and seeders:
    ```sh
    php artisan migrate --seed
    ```

## Admin Login Credentials

The default admin account is created using seeders.

```
Email: admin@gmail.com
Password: admin@123
Url:/adminlogin
```

## Seeders

The project comes with pre-loaded admin and department details using seeders. The following seeders are executed during setup:

-   **AdminSeeder**: Creates a default admin user.
-   **DepartmentSeeder**: Populates the database with initial department data.

## Usage

1. **Employee Registration & Login**

    - Employees can register by selecting a department and providing their details.
    - Upon login, they can submit reports and view their submitted reports.

2. **Admin Dashboard**
    - Admins can log in with the default credentials and manage employees and reports.
    - They can update the status of reports (Pending, Approved, Rejected).

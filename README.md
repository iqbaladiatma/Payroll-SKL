# Payroll Management System

A comprehensive payroll management system built with Laravel that helps manage employee salaries, attendance, and leave requests.

## Features

### Authentication & User Management

-   User authentication system
-   Role-based access control (Admin and User roles)
-   Profile management for all users

### Admin Features

-   Employee (Karyawan) management
    -   Add, edit, and manage employee information
    -   View employee details
-   Salary (Gaji) management
    -   Process and manage employee salaries
    -   Generate salary receipts (kwitansi)
    -   Update salary status
-   Leave Request (Pengajuan) management
    -   Review and approve/reject leave requests
    -   Track leave request status
-   Attendance monitoring
    -   View all employee attendance records
    -   Monitor check-in/check-out times

### Employee Features

-   Personal dashboard
-   Leave request submission
    -   Create new leave requests
    -   View request status
    -   Edit pending requests
-   Attendance tracking
    -   Check-in functionality
    -   Check-out functionality
    -   View attendance history
-   Salary information
    -   View salary details
    -   Download salary receipts

## Technical Stack

-   Laravel Framework
-   PHP
-   MySQL Database
-   Blade Template Engine

## Installation

1. Clone the repository

```bash
git clone [repository-url]
```

2. Install dependencies

```bash
composer install
```

3. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations

```bash
php artisan migrate
```

6. Start the development server

```bash
php artisan serve
```

## Usage

1. Access the application through your web browser
2. Register a new account or login with existing credentials
3. Based on your role (Admin/User), you'll have access to different features
4. Follow the intuitive interface to manage payroll, attendance, and leave requests

## Security

-   All routes are protected with authentication middleware
-   Role-based access control ensures data security
-   Sensitive operations require proper authorization

## License

This project is licensed under the MIT License - see the LICENSE file for details.

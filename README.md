
# Health Facilities

## Overview
The **Health Facilities** repository is a web-based application built to manage and visualize health facility data. This project provides a robust platform for tracking and analyzing healthcare facilities, including their locations. It is developed using **PHP Laravel** with **Filament** for an efficient admin panel, offering a seamless and modern user experience.  Additionally, the application includes a RESTful API to enable integration with external systems, allowing developers to programmatically access and manage health facility using rupadana plugin.

## Installation
To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/irgiys/health-facilities.git
   cd health-facilities
   ```

2. **Install PHP Dependencies**:
   Run the following command to install Laravel and other PHP dependencies:
   ```bash
   composer install
   ```

3. **Set Up Environment Variables**:
   Copy the `.env.example` file to `.env` and configure your database and other settings:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials and other configurations:
   ```env
   APP_NAME=HealthFacilities
   APP_URL=http://localhost
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=health_facilities
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Generate Application Key**:
   Run the following command to generate the Laravel application key:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   Set up the database schema by running migrations:
   ```bash
   php artisan migrate
   ```

6. **Seed the Database (Optional)**:
   If the project includes seeders for sample data, run:
   ```bash
   php artisan db:seed
   ```

7. **Start the Development Server**:
   Launch the Laravel development server:
   ```bash
   php artisan serve
   ```
   The application should now be accessible at `http://localhost:8000`.

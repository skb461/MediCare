# MediCare Delivery & Inventory Management System

This project is a medicine delivery and inventory management web application, designed for easy access to medicines and inventory management for users and an admin. It includes an admin dashboard for managing delivery orders, inventory, and access control via a login system.

## Table of Contents

- [Features](#features)
- [File Structure](#file-structure)
- [Setup Instructions](#setup-instructions)
- [Usage](#usage)
- [Technologies Used](#technologies-used)

## Features

1. **User Pages**:
   - **Home Delivery Form**: Allows users to submit delivery requests by filling in their details and prescribed medicines.
   - **Medicines List**: Displays available medicines in a card format.
   - **Dispensary List**: Shows locations where users can pick up their medicines.

2. **Admin Dashboard**:
   - **View Delivery Orders**: Displays all orders placed, including customer details, address, and medicines.
   - **Inventory Management**: Lists available medicines and their quantities, with an option to add new medicines.
   - **Admin Login**: Secure login system with a session-based restriction.

## File Structure

- `index.php`: Main landing page with links to delivery services.
- `home_delivery.php`: A form for users to request medicine delivery.
- `process_home_delivery.php`: Processes the form data from `home_delivery.php` and stores delivery requests in the database.
- `medicines_list.php`: Displays all available medicines.
- `dispensary_list.php`: Lists the dispensaries and their locations.
- `admin_dashboard.php`: Admin dashboard to manage delivery orders and inventory.
- `login.php`: Login page for admin access to `admin_dashboard.php`.
- `logout.php`: Ends the admin session, redirecting to `login.php`.
- `db_connection.php`: Database connection configuration.
- `style.css`: Custom CSS styling for the project.

## Setup Instructions

1. **Database Setup**:
   - Create a MySQL database named `medicare`.
   - Run the following SQL to create the required tables:

     ```sql
     CREATE TABLE HomeDelivery (
         id INT AUTO_INCREMENT PRIMARY KEY,
         hname VARCHAR(255),
         nid VARCHAR(255),
         phone VARCHAR(255),
         email VARCHAR(255),
         haddress TEXT
     );

     CREATE TABLE OrderMedicines (
         id INT AUTO_INCREMENT PRIMARY KEY,
         order_id INT,
         medicine_name VARCHAR(255),
         amount INT,
         FOREIGN KEY (order_id) REFERENCES HomeDelivery(id)
     );

     CREATE TABLE Medicines (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255),
         price DECIMAL(10, 2),
         available_quantity INT
     );

     CREATE TABLE Dispensaries (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(255),
         address VARCHAR(255)
     );
     ```

2. **Configure Database Connection**:
   - Update `db_connection.php` with your database credentials:

     ```php
     <?php
     $servername = "your_server";
     $username = "your_username";
     $password = "your_password";
     $dbname = "medicare";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ?>
     ```

3. **Admin Login Configuration**:
   - In `login.php`, update the hardcoded credentials if desired. By default:
     - **Username**: `admin`
     - **Password**: `password123`

4. **File Uploads and Permissions**:
   - Ensure that the `uploads` directory exists and is writable if you plan to enable file uploads (e.g., for prescriptions).

5. **Run the Project**:
   - Place the project files in your PHP server’s root directory.
   - Access `index.php` via `http://localhost/index.php` for the main site or `http://localhost/login.php` for the admin login.

## Usage

1. **User Workflow**:
   - Users can visit the home page to navigate to services like Home Delivery and view the Medicines and Dispensary lists.
   - For delivery requests, users can fill out the form on `home_delivery.php`.

2. **Admin Workflow**:
   - Log in via `login.php` to access the admin dashboard.
   - Manage delivery orders and view customer details under "Delivery Orders."
   - Add or update inventory items under "Medicines Inventory."

## Technologies Used

- **Frontend**: HTML, CSS (custom styling in `style.css`), Bootstrap 5 for responsive design.
- **Backend**: PHP for server-side processing.
- **Database**: MySQL for data storage.
- **Session Management**: PHP sessions for secure admin access.


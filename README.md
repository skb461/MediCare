# MediCare Delivery & Inventory Management System

This project is a web application for managing medicine delivery and inventory, enabling both user access to services and an admin dashboard for managing orders, inventory, and access control.

## Table of Contents

- [Features](#features)
- [File Structure](#file-structure)
- [Setup Instructions](#setup-instructions)
- [Usage](#usage)
- [Technologies Used](#technologies-used)

## Features

### User Pages
   - **Home Delivery Form**: Users can request delivery by providing details and uploading a prescription.
   - **Medicines List**: Displays all available medicines with prices and quantities.
   - **Dispensary List**: Lists all dispensaries for medicine pickup.

### Admin Dashboard
   - **View Delivery Orders**: Shows customer details, address, and ordered medicines.
   - **Inventory Management**: Allows the admin to view and add medicines with details such as name, price, and quantity.
   - **Admin Login**: Secured login system with session-based restriction.

## File Structure

- **index.php**: Main landing page.
- **home_delivery.php**: Form for users to request medicine delivery.
- **process_home_delivery.php**: Processes data from `home_delivery.php` and stores it in the database.
- **medicines_list.php**: Displays all available medicines.
- **dispensary_list.php**: Lists all dispensaries.
- **admin_dashboard.php**: Admin panel for managing delivery orders and inventory.
- **login.php**: Admin login page.
- **logout.php**: Ends the admin session.
- **db_connection.php**: Configures the database connection.
- **style.css**: Custom CSS styling for the project.

## Setup Instructions

1. **Database Setup**:
   - Create a MySQL database named `MediCare`.
   - Import the `MediCare.sql` file into your database, or run the following SQL commands:

     ```sql
     CREATE DATABASE MediCare;
     USE MediCare;

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

2. **Database Connection Configuration**:
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

3. **Admin Login Credentials**:
   - In `login.php`, update hardcoded credentials as needed. Default credentials are:
     - **Username**: `admin`
     - **Password**: `password123`

4. **File Permissions**:
   - Ensure the `uploads` directory (if used) is writable to handle file uploads.

5. **Run the Application**:
   - Place project files in your PHP server’s root directory.
   - Access `index.php` via `http://localhost/index.php` for user features, or `http://localhost/login.php` for admin login.

## Usage

### User Workflow
   - Users can access the home page, navigate to services, and request deliveries via `home_delivery.php`.
   - Medicines and dispensaries can be viewed on respective pages.

### Admin Workflow
   - Access the admin dashboard by logging in through `login.php`.
   - Use the dashboard to view customer orders and manage inventory, adding new medicines as needed.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap 5 for responsive design.
- **Backend**: PHP for server-side processing.
- **Database**: MySQL for data management.
- **Session Management**: PHP sessions to secure the admin dashboard.

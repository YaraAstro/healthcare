# Laravel Project Setup Guide

Welcome to the Laravel Project Setup Guide! Follow these instructions to clone, set up, and run the project, including initializing a user in XAMPP and adding sample data.

---

## 1. Initialize User for Backend of Our Laravel Project

### Step 1: Open phpMyAdmin
1. **Start Apache and MySQL** from your XAMPP Control Panel.
2. Open your browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. In phpMyAdmin, click on the **SQL** tab to execute SQL queries.

### Step 2: Create a Database
Run the following SQL query to create a new database:
```sql
CREATE DATABASE lnbtidb;
```

### Step 3: Create a New User
Create a new user `lnbtiproject` with the password `lnbti2024` using:
```sql
CREATE USER 'lnbtiproject'@'localhost' IDENTIFIED BY 'lnbti2024';
```

### Step 4: Grant Access to the Database
Grant all privileges to the `lnbtiproject` user for the `lnbtidb` database:
```sql
GRANT ALL PRIVILEGES ON lnbtidb.* TO 'lnbtiproject'@'localhost';
```

### Step 5: Refresh Privileges
Apply the changes and refresh the privileges with:
```sql
FLUSH PRIVILEGES;
```

### Step 6: Verify the Changes
Verify the user and database creation by checking the **Users** tab in phpMyAdmin.

---

## 2. Clone & Run Laravel Project

### 1. Clone the Repository
Open your terminal and run:
```bash
git clone https://github.com/YaraAstro/healthcare.git
```

### 2. Navigate to the Project Directory
Change to the project directory:
```bash
cd healthcare
```

### 3. Install Dependencies
Install the necessary packages using Composer:
```bash
composer install
```

### 4. Set Up Environment File
Copy the example `.env` file to create your environment configuration:
```bash
cp .env.example .env
```

### 5. Generate Application Key
Generate the application key by running:
```bash
php artisan key:generate
```

### 6. Set Up Database Configuration
Edit the `.env` file with your database settings:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=lnbtidb
DB_USERNAME=lnbtiproject
DB_PASSWORD=lnbti2024
```
Ensure the database is created in MySQL.

### 7. Run Database Migrations
Create the necessary tables with:
```bash
php artisan migrate
```

### 8. Run Database Seeders (Optional)
Populate the database with sample data if seeders are included:
```bash
php artisan db:seed
```

### 9. Install NPM Dependencies (Optional)
If the project uses Laravel Mix, install NPM dependencies and compile assets:
```bash
npm install
npm run dev
```

### 10. Serve the Application
Start the Laravel development server:
```bash
php artisan serve
```
Access your application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 3. Add Sample Data to XAMPP

Use the following SQL commands to insert sample data into your tables.

### Sample Data for `doctor` Table
```sql
INSERT INTO doctor (id, username, name, speciality, email, password) VALUES
('DC001', 'drjohn', 'Dr. John Doe', 'Cardiology', 'john.doe@example.com', 'password123'),
('DC002', 'drjane', 'Dr. Jane Smith', 'Neurology', 'jane.smith@example.com', 'password123'),
('DC003', 'drrobert', 'Dr. Robert Brown', 'Pediatrics', 'robert.brown@example.com', 'password123'),
('DC004', 'drlisa', 'Dr. Lisa White', 'Orthopedics', 'lisa.white@example.com', 'password123'),
('DC005', 'drpeter', 'Dr. Peter Green', 'Dermatology', 'peter.green@example.com', 'password123');
```

### Sample Data for `patient` Table
```sql
INSERT INTO patient (id, username, name, mobile, address, city, state, zip_code, age, email, password) VALUES
('PT001', 'alice', 'Alice Johnson', '123-456-7890', '123 Elm St', 'Springfield', 'IL', '62701', 30, 'alice.johnson@example.com', 'password123'),
('PT002', 'bob', 'Bob Lee', '234-567-8901', '456 Oak St', 'Metropolis', 'NY', '10001', 45, 'bob.lee@example.com', 'password123'),
('PT003', 'carol', 'Carol White', '345-678-9012', '789 Pine St', 'Gotham', 'NJ', '07001', 27, 'carol.white@example.com', 'password123'),
('PT004', 'david', 'David Brown', '456-789-0123', '101 Maple St', 'Star City', 'CA', '90001', 50, 'david.brown@example.com', 'password123'),
('PT005', 'emma', 'Emma Davis', '567-890-1234', '202 Cedar St', 'Central City', 'TX', '75001', 35, 'emma.davis@example.com', 'password123');
```

### Sample Data for `drug` Table
```sql
INSERT INTO drug (id, name, description, img_path, amount) VALUES
('MD001', 'Aspirin', 'Pain reliever and anti-inflammatory medication.', 'https://medlineplus.gov/images/Medicines_share.jpg', '50.00'),
('MD002', 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug (NSAID) used to reduce fever, pain, and inflammation.', 'https://medlineplus.gov/images/Medicines_share.jpg', '60.00'),
('MD003', 'Paracetamol', 'Used to treat fever and mild to moderate pain.', 'https://medlineplus.gov/images/Medicines_share.jpg', '40.00'),
('MD004', 'Amoxicillin', 'Antibiotic used to treat bacterial infections.', 'https://medlineplus.gov/images/Medicines_share.jpg', '150.00'),
('MD005', 'Metformin', 'Medication used to manage type 2 diabetes.', 'https://medlineplus.gov/images/Medicines_share.jpg', '120.00'),
('MD006', 'Lisinopril', 'Used to treat high blood pressure and heart failure.', 'https://medlineplus.gov/images/Medicines_share.jpg', '200.00'),
('MD007', 'Lipitor', 'Statin used to lower cholesterol levels.', 'https://medlineplus.gov/images/Medicines_share.jpg', '250.00'),
('MD008', 'Cetirizine', 'Antihistamine used to relieve allergy symptoms.', 'https://medlineplus.gov/images/Medicines_share.jpg', '80.00'),
('MD009', 'Simvastatin', 'Used to control high cholesterol.', 'https://medlineplus.gov/images/Medicines_share.jpg', '220.00'),
('MD010', 'Prednisone', 'Corticosteroid used to treat inflammatory conditions.', 'https://medlineplus.gov/images/Medicines_share.jpg', '300.00'),
('MD011', 'Hydrochlorothiazide', 'Diuretic used to treat high blood pressure and fluid retention.', 'https://medlineplus.gov/images/Medicines_share.jpg', '90.00'),
('MD012', 'Albuterol', 'Bronchodilator used to treat asthma and chronic obstructive pulmonary disease (COPD).', 'https://medlineplus.gov/images/Medicines_share.jpg', '350.00');
```

Feel free to adjust the sample data to fit your project needs. Enjoy working with your Laravel application!

This version uses clear headings and bullet points to make the instructions easy to follow and more organized.


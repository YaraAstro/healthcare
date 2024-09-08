# Clone & Run Laravel Project
To run a Laravel project after cloning it from GitHub, you can follow this step-by-step guide:

### 1. **Clone the Repository**
   Open your terminal and run the following command to clone the project:
   ```bash
   git clone https://github.com/YaraAstro/healthcare.git
   ```

### 2. **Navigate to the Project Directory**
   After cloning, navigate into the project folder:
   ```bash
   cd healthcare
   ```

### 3. **Install Dependencies**
   Run the following command to install all the necessary packages (make sure you have Composer installed):
   ```bash
   composer install
   ```

### 4. **Set Up Environment File**
   Laravel uses a `.env` file for environment configuration. Copy the example `.env` file:
   ```bash
   cp .env.example .env
   ```

### 5. **Generate Application Key**
   Laravel requires an application key to be set. You can generate this key by running:
   ```bash
   php artisan key:generate
   ```

### 6. **Set Up Database Configuration**
   Open the `.env` file and configure your database settings (MySQL, for example):
   ```
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=3306
   DB_DATABASE=lnbtidb
   DB_USERNAME=lnbtiproject
   DB_PASSWORD=lnbti2024
   ```
   Make sure the database is created in MySQL.

### 7. **Run Database Migrations**
   Once the database is set up, run the following command to create the necessary tables:
   ```bash
   php artisan migrate
   ```

### 8. **Run Database Seeders (Optional)**
   If there are seeders included with the project, you can populate the database with sample data:
   ```bash
   php artisan db:seed
   ```

### 9. **Install NPM Dependencies (Optional)**
   If the project uses Laravel Mix for assets like CSS and JavaScript, run the following commands:
   ```bash
   npm install
   npm run dev
   ```

### 10. **Serve the Application**
   Finally, run the Laravel development server:
   ```bash
   php artisan serve
   ```
   Your application will be available at `http://127.0.0.1:8000`.

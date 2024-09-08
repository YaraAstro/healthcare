# Install Laravel for the very first time
Here’s a simple guide to install Laravel on Windows using XAMPP for the first time:

### Step 1: **Install Composer**
- Download and install **Composer** from the official site: [https://getcomposer.org/](https://getcomposer.org/).
- During installation, select the path to PHP inside your XAMPP folder (e.g., `C:\xampp\php\php.exe`).
- To verify, open **Command Prompt** and run:
  ```bash
  composer
  ```
  You should see the Composer version details.

### Step 2: **Enable ZIP Extension in `php.ini`**
- Open your `php.ini` file (usually found in `C:\xampp\php\php.ini`).
- Search for the following line:
  ```ini
  ;extension=zip
  ```
- Remove the semicolon (`;`) to uncomment the line:
  ```ini
  extension=zip
  ```
- Save and close the file. **Restart Apache** from the XAMPP Control Panel to apply the changes.

### Step 3: **Create a New Laravel Project**
1. Open **Command Prompt** and navigate to the `htdocs` directory of your XAMPP installation (usually `C:\xampp\htdocs`):
   ```bash
   cd C:\xampp\htdocs
   ```

2. Run the following command to create a new Laravel project: *(in this case you don't need to do this and the rest of this guide)*
   ```bash
   composer create-project --prefer-dist laravel/laravel my-laravel-app
   ```
   This will create a new Laravel project folder called `my-laravel-app` in `htdocs`.

### Step 4: **Set Up Laravel Project**
1. Navigate to the project directory:
   ```bash
   cd my-laravel-app
   ```

2. Copy the example `.env` file:
   ```bash
   cp .env.example .env
   ```

3. Generate an application key:
   ```bash
   php artisan key:generate
   ```

### Step 5: **Run Laravel**
You can serve your Laravel application using the built-in server:
```bash
php artisan serve
```
Then visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

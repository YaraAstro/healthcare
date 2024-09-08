# Initialize User for Backend of Our Laravel Project

Here’s a simple guide to creating a user in XAMPP using SQL queries. You will learn how to create a database, a user, grant privileges to the user, and refresh privileges using SQL commands.

### Step 1: **Open phpMyAdmin**
1. Start **Apache** and **MySQL** from your XAMPP Control Panel.
2. Open your browser and go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. In the phpMyAdmin interface, click on the **SQL** tab to execute SQL queries.

### Step 2: **Create a Database**
Execute the following SQL query in the **SQL** tab to create a new database:
```sql
CREATE DATABASE lnbtidb;
```
This will create a new database called `lnbtidb`.

### Step 3: **Create a New User**
To create a new user `lnbtiproject` with the password `lnbti2024`, run this query:
```sql
CREATE USER 'lnbtiproject'@'localhost' IDENTIFIED BY 'lnbti2024';
```

### Step 4: **Grant Access to the Database**
Now, grant all privileges to the `lnbtiproject` user for the `lnbtidb` database:
```sql
GRANT ALL PRIVILEGES ON lnbtidb.* TO 'lnbtiproject'@'localhost';
```
This allows the user to have full control (select, insert, update, delete, etc.) over the `lnbtidb` database.

### Step 5: **Refresh Privileges**
To apply the changes and refresh the privileges, run:
```sql
FLUSH PRIVILEGES;
```

### Step 6: **Verify the Changes**
You can check if the user and the database have been created by navigating to the **Users** tab in phpMyAdmin to see the newly created user `lnbtiproject`.

---

You’ve now successfully created a database, user, granted privileges, and refreshed the privileges in XAMPP using SQL queries!
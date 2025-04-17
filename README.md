## How to Run the Project

Follow the steps below to set up and run the Laravel project on your local machine:

### 1. Clone the Repository

First, clone the repository to your local machine using the following command:
```bash
git clone <repository-url>
```
Replace `<repository-url>` with the actual URL of the repository.

### 2. Navigate to the Project Directory

Move into the directory where the project was cloned:
```bash
cd <project-folder>
```
Replace `<project-folder>` with the name of the folder where the project resides.

### 3. Install Dependencies

Install the required dependencies using Composer:
```bash
composer install
```

### 4. Set Up the Environment File

Create a copy of the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```

Open the `.env` file and configure the following settings:
- **Database Configuration**: Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` fields with your MySQL database credentials.

### 5. Generate the Application Key

Run the following command to generate the application key:
```bash
php artisan key:generate
```

### 6. Run Migrations

Run the migrations to create the necessary database tables:
```bash
php artisan migrate
```

If you need to create the `students` table manually for this project, ensure your migration file includes the following schema:
```php
Schema::create('students', function (Blueprint $table) {
    $table->string('roll_no')->primary();
    $table->string('name');
    $table->string('city');
    $table->text('detail')->nullable();
    $table->timestamps();
});
```

OR Create  `Students` table manually in the mysql Database with the following fields 
```php
roll_no (int, primary key)
name (varchar 255)
city (varchar 255)
detail (text)
```


### 7. Seed the Database (Optional)

If the project includes seeders for initial data, you can run the following command:
```bash
php artisan db:seed
```

### 8. Serve the Application I

Run the Laravel development server:
```bash
npm run dev
```

### 8. Serve the Application II

Run the Laravel development server:
```bash
php artisan serve
```

By default, the application will be accessible at `http://127.0.0.1:8000`.

### 9. Access the Application

Open your web browser and navigate to:
```
http://127.0.0.1:8000
```

You should now see the Laravel application running successfully.

---

If you encounter any issues, ensure that:
- Your PHP version meets the Laravel requirements.
- MySQL is running and the database credentials are correct.
- All required extensions for Laravel are enabled in your PHP configuration.

Enjoy building with Laravel!


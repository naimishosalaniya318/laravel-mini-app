# Laravel + Vite

Here’s the step-by-step setup instruction for the Laravel mini-application, including explanations of how key parts were implemented:

## Recommended IDE Setup

- [VS Code](https://code.visualstudio.com/)

# Project Setup Instructions

    By following these steps, you should be able to setup this project.

### Step 1: Clone the Repository:

Start by cloning the GitHub repository:

```bash
    git clone https://github.com/naimishosalaniya318/laravel-mini-app.git
    cd your-laravel-mini-app
```

### Step 2: Install dependencies:

Make sure to install all the necessary dependencies by running the following command:

```bash
    composer install
```

### Step 3: Setup Laravel Authentication:

```bash
    php artisan ui vue --auth
    npm install && npm run dev
```

### Step 4: Set Up Environment Variables:

```bash
    cp .env.example .env
```

### Step 5: Database Configuration:

Update the database configuration with your database connection details.

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
```

### Step 6: AWS S3 Configuration:

Set up AWS S3 credentials to handle image uploads.

```bash
    AWS_ACCESS_KEY_ID=your_aws_access_key
    AWS_SECRET_ACCESS_KEY=your_aws_secret_key
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=your_s3_bucket_name
```

### Step 7: Third-Party Weather API Configuration:

Add your weather API key (for OpenWeatherMap).

```bash
    OPENWEATHERMAP_API_KEY=your_openweather_api_key
```

### Step 8: Generate Application Key:

Laravel requires an application key to be set. You can generate it with the following command:

```bash
    php artisan key:generate
```

### Step 9: Run Migrations:

Run the database migrations to set up the users and posts tables:

```bash
    php artisan migrate
```

### Step 10: Serve the Application:

You can now run the application locally with:

```bash
    php artisan serve
```

```bash 
    npm run dev
```

Key Parts Implemented

	1.	User Authentication:
        •	Login System: Built-in Laravel authentication (Auth::routes()) is used to handle user login and registration.
	2.	Post Management:
        •	Post CRUD: Users can create posts with a title, content, and an image upload.
        •	Image Uploads to S3: Posts allow image uploads that are stored in an AWS S3 bucket. The file path is saved in the database, and the image URL is displayed on the post page.
	3.	Third-Party API Integration:
	    •	Weather API: The homepage integrates a weather API (e.g., OpenWeatherMap) to display the current weather for a hardcoded city (like New York).
	4.	Header with Navigation:
	    •	The header includes menu items: Home (which displays weather data) and Posts (for managing posts).
	5.	Validation:
	    •	Custom validation is added to ensure that users enter valid post data, with appropriate error messages for missing fields or incorrect file types for images.
	6.	Postman Documentation:
	    •	API documentation for creating posts and listing posts is provided in a Postman collection to demonstrate the functionality of the application.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



# Laravel Financial Tracker App

This is a web application built using Laravel that helps users to track their financial transactions.

## Installation

To install this application, follow the instructions below:

1. Clone the repository:

```
git clone https://github.com/oktayla/financial-tracker-app.git
```

2. Navigate into the project directory:

```
cd financial-tracker-app
```

3. Install the dependencies:

```
composer install
```

4. Create a new `.env` file:

```
cp .env.example .env
```

5. Generate a new `APP_KEY`:

```
php artisan key:generate
```

6. Create a new database and update the `.env` file with the database details.

7. Run the database migrations:

```
php artisan migrate
```

8. If you want to seed the database with sample data, you can run the following command:

```
php artisan db:seed
```

9. Start the development server:

```
php artisan serve
```

The application will now be accessible at [http://localhost:8000](http://localhost:8000).

## Usage

Once the application is installed and running, users can create an account and start adding transactions. The application provides features such as adding categories, filtering transactions by date range, and generating reports.

Some key features of the application include:

- 💸 Expense Tracking: Add, edit, and delete expenses with details such as amount, category, and date.
- 💰 Income Tracking: Record your income sources and keep track of your earnings.
- 💳 Budgeting: Set monthly budgets for different expense categories and monitor your spending.
- 📊 Reports and Visualization: Gain insights into your financial health with visual charts and reports.
- 🌍 Multi-Currency Support: Track expenses and income in different currencies for travelers or individuals with international financial transactions.

## Contributing

Contributions are welcome! If you encounter any issues or have any suggestions for improvement, please create a new issue or pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

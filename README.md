<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# LaravelPaypal

A Laravel demo project integrating PayPal payments, category management, and product management.

## Features

- Category CRUD (Create, Read, Update, Delete)
- Category image upload
- Category activation toggle
- Product CRUD (Create, Read, Update, Delete)
- Product stock and price management
- PayPal payment integration
- Responsive UI with Tailwind CSS

## Requirements

- PHP >= 8.1
- Composer
- MySQL or compatible database
- Node.js & npm (for frontend assets)

## Setup

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/LaravelPaypal.git
    cd LaravelPaypal
    ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Copy `.env.example` to `.env` and set your environment variables.

4. Generate application key:
    ```sh
    php artisan key:generate
    ```

5. Run migrations:
    ```sh
    php artisan migrate
    ```

6. Build frontend assets:
    ```sh
    npm run build
    ```

7. Start the development server:
    ```sh
    php artisan serve
    ```

## Usage

- Manage categories from `/categories`
- Add, edit, or delete categories
- Upload category images
- Toggle category activation
- Manage products from `/products`
- Add, edit, or delete products
- Set product price and stock
- Test PayPal payments (see documentation for setup)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)

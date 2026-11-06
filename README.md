# Restaurant App

A restaurant management application built with Laravel. It includes management screens for users, categories, menus, and dining tables, plus cashier, sales, and reporting features.

## Technology stack

| Technology | Version |
| --- | --- |
| PHP | `^8.0.2` (Composer requirement; PHP 8.1 or 8.2 is recommended for this Laravel 9 project) |
| Laravel | `9.48.0` (locked in `composer.lock`) |
| Database | MySQL or MariaDB |
| Node.js / npm | Node.js 18+ and npm (for Vite and frontend assets) |
| Vite | `^4.0` |
| Tailwind CSS | `^3.1` |
| Alpine.js | `^3.4` |

The project has been run with PHP 8.5, but this older Laravel/dependency stack can emit PHP deprecation warnings on newer PHP releases.

## Requirements

- PHP and Composer
- MySQL or MariaDB
- Node.js and npm
- PHP's PDO MySQL extension

## Clone and run locally

Run these commands from a terminal. Replace `<repository-url>` with the Git URL for this project.

1. **Clone the project and enter its folder:**

   ```bash
   git clone <repository-url>
   cd restaurantApp
   ```

2. **Install PHP dependencies and create your local environment file:**

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. **Create a database** in MySQL or MariaDB. The default database name in `.env.example` is `restaurantapp`.

4. **Configure database access** in `.env` to match your local database server:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=restaurantapp
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Set `DB_USERNAME` and `DB_PASSWORD` to the credentials configured on your machine.

5. **Create the schema and load the starter data:**

   ```bash
   php artisan migrate --seed
   ```

   The seeders load example users, categories, menu items, tables, sales, and sale details. The seeded users all use the development password `User@1234`; change or remove these accounts before deploying the application.

6. **Install and build frontend assets:**

   ```bash
   npm install
   npm run build
   ```

7. **Start the local Laravel server:**

   ```bash
   php artisan serve
   ```

   Open the URL printed by Artisan, usually [http://127.0.0.1:8000](http://127.0.0.1:8000).

### Frontend development watcher

To rebuild frontend assets automatically as you edit them, run this command in a second terminal and leave it running:

```bash
npm run dev
```

## Useful commands

```bash
php artisan migrate --seed   # Apply migrations and load starter records
php artisan db:seed          # Load or update starter records
php artisan route:list       # List application routes
npm run build                # Build production frontend assets
```

## Project structure

| Path | Contents |
| --- | --- |
| `app/Http/Controllers/` | Web request handling, authentication, cashier, management, and reports |
| `app/Http/Middleware/` | Request middleware, including admin access checks |
| `app/Models/` | Eloquent models for users, categories, menus, tables, and sales |
| `app/Exports/` | Report export classes |
| `bootstrap/` | Laravel application bootstrap and cache |
| `config/` | Application and service configuration |
| `database/migrations/` | Database schema migrations |
| `database/seeders/` | Starter data seeders and `DatabaseSeeder` |
| `database/factories/` | Model factories for tests and development |
| `public/` | Web entry point and publicly served assets, including menu images |
| `resources/views/` | Blade templates for authentication, management, cashier, and reports |
| `resources/css/`, `resources/js/` | Frontend source assets compiled by Vite |
| `routes/` | Web, API, authentication, and console routes |
| `storage/` | Logs, cache, sessions, and generated application files |
| `tests/` | Automated tests |
| `restaurantapp.sql` | SQL dump of the original sample database |

## Notes

- `.env` contains machine-specific configuration and should not be committed.
- `restaurantapp.sql` is provided as a database dump; for a fresh local setup, use the migrations and seeders above.
- The seeders use the sample IDs and update their matching records when run again. `php artisan migrate:fresh` drops all existing tables and data, so only use it when you intend to reset the database.

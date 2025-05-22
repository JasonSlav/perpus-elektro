# How to use Laravel (From Repo) with Tailwind CSS

# 1. First, clone this repo with this command (use git command):

```bash
git clone ....
```

# 2. Second, get vendor from composer:

```bash
composer install
```

# 3. Copy .env.example then create new file name .env

```bash
cp .env.example .env
```

# 4. Generate key for app key in .env use this command:

```bash
php artisan key:generate
```

# 5. Modify inside .env (modify the data that you need)

```bash
APP_NAME
DB_CONNECTION = sqlite => mysql
DB_DATABASE = laravel => anything do you want
DB_USERNAME = root => anything do you want (after configure your mysql)
DB_PASSWORD = ... => anything do you want (after configure your mysql)
SESSION_DRIVER = database => file
```

# 6. Migrate your database (it has seeder inside)

```bash
php artisan migrate
```

# 7. Add npm because this project are include with tailwind css

```bash
npm install
```

# 8. Run npm to run tailwind

```bash
npm run dev
```

# 9. Run laravel

```bash
php artisan serve
```

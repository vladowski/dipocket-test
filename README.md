# Test task for DiPocket

This project is built with Laravel and Vue3. It requires the following steps to be launched.

## Installation
Clone the repository to your local machine.
```
git clone <repository-link>
```

Install backend dependencies by running composer install in the backend directory.
```
cd backend
composer install
```

Copy `.env.example` to `.env` and fill out `VITE_BACKEND_URL` with the relevant value.

Start the Laravel backend server using the following command.
```
php artisan serve
```

Install frontend dependencies by running `npm install` in the frontend directory.
```
cd ../frontend
npm install
```

Start the Vue3 frontend using the following command.
```
npm run dev
```

Alternatively, you can build the production-ready Vue3 frontend using the following command.
```
npm run build
```


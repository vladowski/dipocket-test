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

Start the backend server using the following command from the `backend/public` directory.
```
cd public
php -S localhost:8000
```

Go to `frontend` folder and copy `.env.example` to `.env` and fill out `VITE_BACKEND_URL` with the relevant value. (`http://localhost:8000` for local setup)

Install frontend dependencies by running `npm install` in the frontend directory.
```
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


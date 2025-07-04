# PHP + React (Inertia-like SPA)

This project is a lightweight Single Page Application (SPA) built using **React**, **Vite**, and **vanilla PHP**, emulating the core behavior of **Inertia.js** without any full-stack PHP framework like Laravel. It follows a basic **MVC architecture** on the backend and uses a modern frontend stack with **TypeScript** and **TailwindCSS**.

---

## ⚙️ Technologies Used

### 🔹 Frontend
- **React** (with TypeScript)
- **Vite** (for development/build)
- **TailwindCSS v4**
- **Inertia.js (React adapter)** — to enable SPA navigation with server-side responses

### 🔹 Backend
- **Vanilla PHP** with a basic MVC structure
- No frameworks (no Laravel, Symfony, etc.)
- Inertia response **manually simulated** in controllers

---

## 📁 Project Structure

```
project/
├── app/             # PHP controllers (MVC)
├── core/            # App bootstrap, router, config
├── public/          # Public directory (served on the web)
├── src/             # Frontend source code (React + TSX)
├── build/           # Production frontend build output
├── index.php        # Main entry point for routing
├── routes.php       # Route definitions
├── vite.config.ts   # Vite configuration
├── .env             # Environment settings
```

---

## 🚀 Development Guide

### 1. Install frontend dependencies:

```bash
npm install
```

### 2. Start development server (Vite with auto build):

```bash
npm run builder
```

> This watches `src/` and automatically rebuilds frontend files into the `build/` folder whenever you make changes.

### 3. Backend:

Serve your PHP app using:
- PHP's built-in server:
  ```bash
  php -S localhost:8888
  ```
- Or with tools like XAMPP / Laragon.

> The frontend uses `http://localhost:5173` during development and proxies all requests to `http://localhost:8888`.

---

## 🧱 Building the Frontend (Production)

To generate the final production-ready frontend assets:

```bash
npm run build
```

This will output all files into the `build/` folder. You can then upload both your **backend PHP files** and this **build folder** to your production server.

---

## 🌐 Routing System

- All backend routes are defined inside `routes.php`
- Controllers return either:
  - JSON format when `X-Inertia: true` is present (SPA mode)
  - Full HTML with embedded Inertia data for regular requests (SSR-like fallback)
- Frontend pages are React components placed under `src/Pages/`

---

## ⚙️ Environment Configuration

You can set environment settings in the `.env` file:

```dotenv
APP_ENV=development
APP_URL=http://localhost:8888
```

- In development, Vite dev server and HMR are used
- In production, PHP loads the compiled files from `/build`

---

## 📦 Deployment (Production)

To deploy your app to a web host:

1. Upload all PHP files (`index.php`, `routes.php`, `app/`, `core/`, etc.)
2. Upload the generated `build/` folder (from `npm run build`)
3. Ensure `.env` is configured correctly for production

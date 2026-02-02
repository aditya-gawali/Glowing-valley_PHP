# Migration plan — PHP → React

This document lists a recommended per-file mapping and next steps to migrate the frontend into the React app in `react/`.

## High level
- Use existing `react/` Vite app as the target.
- Routing with React Router v6 (`/`, `/shop`, `/product/:id`, `/cart`, etc.).
- Global state via Zustand: `cart`, `products`, `auth`.
- API calls via `src/services/api.js` (Axios), configured with `VITE_API_BASE_URL`.

## Suggested file mapping
- `index.php` → `src/pages/Home.jsx` (main landing)
- `shopAll.php` → `src/pages/Shop.jsx`
- `product.php` → `src/pages/Product.jsx` (route `/product/:id`)
- `cart.php` → `src/pages/Cart.jsx`
- `about.php` → `src/pages/About.jsx`
- `contact.php` → `src/pages/Contact.jsx`
- `popular.php` → `src/pages/Popular.jsx` (section or page)
- `overview.php` → `src/pages/Overview.jsx` (dashboard-like page)
- `components/navbar.html` → `src/components/Navbar.jsx`
- `components/footer.html` → `src/components/Footer.jsx`
- `components/search.php` → `src/components/Search.jsx`
- `components/founder.html` → `src/components/Founder.jsx`
- Admin (optional migration):
  - `admin/views/homepage.php` → `src/admin/Dashboard.jsx`
  - `admin/views/product.php` → `src/admin/ProductAdmin.jsx`
  - `admin/views/newProduct.php` → `src/admin/NewProduct.jsx`

## Next steps (priority)
1. Install dependencies: run `cd react && npm install` to install `react-router-dom`, `axios`, `zustand`.
2. Build out missing pages and components listed above.
3. Copy static assets (images, fonts) into `react/public/` or import from `assets/` folder and update image paths.
4. Replace server-side includes with React components and client-side API calls.
5. Implement authentication flows and protected routes for admin (or keep admin area separate).
6. Add unit/visual tests (React Testing Library / vitest) and E2E if desired.

## API notes
- The store scaffolding expects endpoints like:
  - GET `/api/products` → returns array of products
  - GET `/api/products/:id` → single product object
  - Auth endpoints: POST `/api/auth/login`, POST `/api/auth/register`, GET `/api/auth/me`
  - Admin endpoints: CRUD under `/api/admin/products` (if migrating admin)

## Admin area
- `admin/` is currently server-rendered. Options:
  - Keep admin as is and migrate later, or
  - Migrate admin views into `react/` under `/admin` with protected routing and role-based access.

## Tasks for me (if you'd like me to continue)
- Convert remaining PHP templates into React components (I can do this per file or by priority).
- Replace immediate PHP-driven pages with React pages and wire to your real API (send API docs or base URL).
- Create a PR with the skeleton and run `npm install` + `npm run dev` to test locally and iterate.

---
If you'd like, I can start converting specific pages now—tell me which pages to prioritize and provide API docs or base URL for endpoints.

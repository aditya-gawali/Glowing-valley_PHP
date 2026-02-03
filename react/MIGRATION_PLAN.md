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

## Progress so far
- Converted: `index.php` → `src/pages/Home.jsx` (hero, popular, categories)
- Converted: `shopAll.php` → `src/pages/Shop.jsx`
- Converted: `popular.php` → `src/pages/Popular.jsx`
- Converted: `overview.php` → `src/pages/Product.jsx` (variant selection + add to cart)
- Converted: `cart.php` → `src/pages/Cart.jsx` (cart UI backed by Zustand)
- Converted: `about.php` → `src/pages/About.jsx`
- Converted: `contact.php` → `src/pages/Contact.jsx` (form wired to `POST /contact`)
- Converted shared components: `components/navbar.html` → `src/components/Navbar.jsx`, `components/footer.html` → `src/components/Footer.jsx`, `components/founder.html` → `src/components/Founder.jsx`, `components/search.php` → `src/components/Search.jsx`
- Admin skeleton: `admin/views/*` → `src/admin/*` (Dashboard, Products list, NewProduct, Login, ProtectedRoute)
- Stores: `src/stores/{productStore,cartStore,authStore}` implemented and wired.
- API client: `src/services/api.js` configured to use a dummy API base URL (`https://api.example.com`)

## Next steps / remaining files
- Convert any remaining small PHP fragments or server-side helpers into client-side components (if any).
- Add CSS tweaks and ensure asset paths are correct (copy images to `/public` if needed).
- Replace dummy API endpoints with your real API once provided and adapt request/response shapes.
- Implement admin auth and complete CRUD flows with real API.
- Add unit/e2e tests and finalize cleanup (remove PHP files if you prefer).

---
If you'd like, I can continue and complete any remaining pieces, wire up the real API, and open a PR with these changes.

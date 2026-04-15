# Lab8 Professional Laravel CRUD Dashboard

This project is an upgraded version of Lab7, copied into Lab8 and enhanced into a dashboard-level application with:

- Product image upload and storage integration
- jQuery DataTables for search, pagination, sorting, and responsiveness
- Dashboard analytics with Chart.js
- Modern admin-style UI (sidebar, topbar, stat cards)

## Features Added

### 1. File Storage and Product Images

- Products now support optional image upload
- Images are stored in the public storage disk under products/
- Product list and detail pages show uploaded images
- Image is automatically removed from storage when replacing or deleting a product

### 2. DataTables Integration

- Product list uses jQuery DataTables
- Includes:
	- Instant search
	- Client-side pagination
	- Sorting
	- Responsive behavior

### 3. Dashboard + Charts

- New dashboard route: /dashboard
- Stat cards:
	- Total products
	- Total inventory value
	- Average product price
- Chart.js visualizations:
	- Category distribution (doughnut chart)
	- Average price by category (bar chart)

### 4. Professional Admin UI

- Sidebar navigation
- Topbar with page heading and timestamp
- Bootstrap 5 styling with card-based layout

## Key Files Updated

- routes/web.php
- app/Http/Controllers/ProductController.php
- app/Http/Controllers/DashboardController.php
- app/Http/Requests/StoreProductRequest.php
- app/Models/Product.php
- database/migrations/2026_04_15_000002_add_image_path_to_products_table.php
- resources/views/layouts/app.blade.php
- resources/views/dashboard/index.blade.php
- resources/views/products/index.blade.php
- resources/views/products/partials/form.blade.php
- resources/views/products/create.blade.php
- resources/views/products/edit.blade.php
- resources/views/products/show.blade.php

## Laragon Setup and Run Steps

1. Open terminal in Lab8 project:

```bash
cd e:/laragon/www/Lab8
```

2. Install dependencies (if needed):

```bash
composer install
npm install
```

3. Prepare environment:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database credentials in .env for your Laragon MySQL instance.

5. Run migrations:

```bash
php artisan migrate
```

6. Create storage symlink for uploaded images:

```bash
php artisan storage:link
```

7. Start services:

```bash
php artisan serve
npm run dev
```

8. Open app:

- Dashboard: http://127.0.0.1:8000/dashboard
- Products: http://127.0.0.1:8000/products

## Notes

- If you migrated before adding image_path column, re-run migration:

```bash
php artisan migrate
```

- If using a fresh setup and you want to reset all tables:

```bash
php artisan migrate:fresh
```

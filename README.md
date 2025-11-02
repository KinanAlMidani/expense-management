# Expense Management Module

This module is built for **Expense Management System** and it's built with the modular Laravel architecture.
It demonstrates clean code structure, domain isolation, and scalable design practices suitable for ERP-level systems.

---

## Overview

The `Expenses` module provides full CRUD functionality for managing expenses, including:

- Create, list, update, and delete expenses  
- Optional filtering by category and date range  
- Validation using Form Requests  
- Business logic encapsulated in a dedicated Service Layer  
- Data access handled through a Repository Layer  
- API-based routing with proper HTTP status codes  
- (Bonus) Event example and Resource formatting for responses

---

## Architecture & Structure

The code follows **modular architecture** principles inspired by Domain-Driven Design (DDD).  
Each business domain (here, "Expenses") is fully isolated under its own folder.

Modules/
└── Expenses/
├── Http/
│ ├── Controllers/
│ │ └── ExpenseController.php
│ ├── Requests/
│ │ ├── StoreExpenseRequest.php
│ │ └── UpdateExpenseRequest.php
│ └── Resources/
│ └── ExpenseResource.php
├── Models/
│ └── Expense.php
├── Services/
│ └── ExpenseService.php
├── Repositories/
│ └── ExpenseRepository.php
├── Events/
│ └── ExpenseCreated.php (optional bonus)
├── routes/
│ └── api.php
├── database/
│ └── migrations/
│ └── 2025_10_31_104646_create_expenses_table.php
└── Providers/
└── ExpenseServiceProvider.php

---

## Setup Instructions

### 1️⃣ Clone and Install

```bash
git clone https://github.com/KinanAlMidani/expenses.git
cd expenses
composer install
```

### 2️⃣ Configure Environment

Ensure your .env file has correct database settings.

```bash
cp .env.example .env
php artisan key:generate
```

3️⃣ Register the Module

Add the service provider to your config/app.php:

```php
'providers' => [
    // ...
    Modules\Expenses\Providers\ExpenseServiceProvider::class,
],
```

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

5️⃣ API Routes

The module automatically registers API routes under /api/expenses.

Example requests:

| Method   | Endpoint                                                    | Description                 |
| -------- | ----------------------------------------------------------- | --------------------------- |
| `GET`    | `/api/expenses`                                             | List all expenses           |
| `POST`   | `/api/expenses`                                             | Create a new expense        |
| `PUT`    | `/api/expenses/{id}`                                        | Update an expense           |
| `DELETE` | `/api/expenses/{id}`                                        | Delete an expense           |
| `GET`    | `/api/expenses?category=food&from=2025-01-01&to=2025-01-31` | Filter by category and date |

## Design Decisions

Modular Architecture: Keeps domains isolated and scalable for large ERP systems.

Service Layer: Separates business logic from controllers for cleaner, testable code.

Repository Pattern: Centralizes data access for future flexibility (e.g., swapping ORM or external data source).

UUIDs for IDs: Future-proof for distributed systems and data merging.

Form Requests: Centralized validation and cleaner controllers.

Resource Formatting: Consistent API responses and easier front-end integration.

Event Example: Demonstrates system extensibility (e.g., notifications, audit logging).

## Assumptions

Authentication is not required for this test (API is open).

No need for category management — a simple enum field is sufficient.

This module is designed to be easily integrated into a larger system (e.g., ERP or accounting app).

No pagination was requested, so all expenses are returned as a collection.


## Time Spent

| Task                                                    | Approx. Duration |
| ------------------------------------------------------- | ---------------- |
| Project setup & architecture planning                   | 30 min           |
| Implementing model, migration, controller, and requests | 45 min           |
| Building service & repository layers                    | 40 min           |
| Adding resource and event                               | 20 min           |
| Writing README & cleanup                                | 20 min           |
| **Total**                                               | **~2.5 hours**   |


## Testing (With PHPUnit)

Run feature tests:

```bash
php artisan test --filter=ExpenseTest
```


Author: Kinan Al Midani
Tech Stack: Laravel 11.x, PHP 8.3
Architecture: Modular / Domain-Driven
Focus: Clean code, scalability, and ERP-readiness
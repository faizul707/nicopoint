# NIXGO9 Order Management V1

## What this package adds

1. MySQL/MariaDB order tables:
   - `nix_orders`
   - `nix_order_items`
   - `nix_order_events`
2. Secure order helper with:
   - PDO prepared statements
   - CSRF token
   - server-side validation
   - server-side cart snapshot
   - transaction-based order creation
3. `api/create-order.php`
4. `order-confirmation.php`
5. `admin/orders.php`
6. Matching premium CSS/JS.

## Important

The current NIXGO9 checkout already collects the customer and delivery details, but its current final step is explicitly a review-only flow. This package therefore records a **pending_review** order and does NOT claim that payment has completed.

Do not connect a payment gateway until the site's applicable legal, age, destination and payment requirements have been decided and implemented.

## Installation

### 1. Database

Open `database/orders.sql` and run it against the same MySQL/MariaDB database used by the NIXGO9 website.

### 2. Database connection

The order helper supports these existing constants if your `config.php` defines them:

```php
DB_DSN
DB_USER
DB_PASS
```

or:

```php
DB_HOST
DB_PORT
DB_NAME
DB_USER
DB_PASS
```

If your current configuration uses different names or an existing PDO/mysqli connection object, do NOT create duplicate credentials. Adapt `includes/core/order-db.php` to reuse the site's existing connection.

### 3. Copy files

Copy the package contents into the NIXGO9 project:

```text
api/create-order.php
order-confirmation.php

includes/core/order-db.php
includes/core/orders.php

admin/orders.php

assets/css/order-confirmation.css
assets/css/admin-orders.css

assets/js/order-confirmation.js
database/orders.sql
```

### 4. Protect the owner area

`admin/orders.php` is a foundation only. Put your existing admin authentication/authorization before the page is exposed publicly.

### 5. Connect checkout

The final checkout button should POST the form data to:

```text
api/create-order.php
```

including:

```text
csrf_token
full_name
email
phone
address
city
postal_code
country
confirm_details
age_confirmed
```

The API returns:

```json
{
  "ok": true,
  "order_number": "NIX-YYYYMMDD-XXXXXX",
  "redirect": ".../order-confirmation.php?order=..."
}
```

## Next build

After this foundation is connected and tested:

- owner order detail page
- status update API
- customer order lookup
- shipping/tracking fields
- payment gateway adapter
- email notifications
- dashboard KPIs
- order search
- order activity controls

The existing cart should not be cleared merely because an order record was created. Cart clearing should happen at the correct confirmed/payment state after the payment and fulfilment rules are finalized.

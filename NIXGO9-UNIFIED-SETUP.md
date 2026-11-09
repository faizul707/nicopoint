# NIXGO9 — Unified Public + Customer + Admin Build

This build is based on the uploaded `test.wordpressforall.com (3)(1).zip`.

## What was rebuilt

- Shared NIXGO9 typography and light botanical visual language.
- Age gate before public pages.
- Optional customer account system:
  - Sign in
  - Create account
  - Forgot password
  - Password reset by email
  - Account page
  - Sign out
- Interactive owl authentication experience:
  - Watches username typing
  - Looks away during password entry
  - Reacts with a head shake on incorrect credentials
  - Happy expression on successful authentication
- Admin control-room login:
  - Sign in
  - Forgot administrator ID
  - Forgot administrator password
  - Recovery phrase protected reset
  - Logout
- Admin dashboard/order pages use a matching NIXGO9 control-room visual system.
- Fixed the broken `../config.php` dependency by adding a root compatibility loader.
- Fixed the `orders.php` / `order.php` mismatch by adding root compatibility helpers.
- Added the missing `admin-v5.css` and `admin-v5.js` files referenced by the admin pages.
- Added missing `scripts.js` compatibility file.
- Removed obsolete `admin.q` and the insecure public `password-hash.php` helper from the deployment copy.
- Added simple Privacy Policy, Refund Policy and Compliance pages so existing footer links are real pages.

## One server-specific setting

The archive cannot contain your real MySQL password because it was not included in the uploaded project.

Edit:

`includes/core/config.php`

and set:

```php
define('DB_PASS', 'YOUR_REAL_CPANEL_DATABASE_PASSWORD');
```

Your database details are already set to:

- Host: `localhost`
- Database: `houseofb_test`
- Username: `houseofb_test`

You may instead provide the password through the environment variable `NIXGO9_DB_PASS`.

## Admin recovery phrase

Set this in `includes/core/config.php`:

```php
define('NIX_ADMIN_RECOVERY_CODE', 'your-private-recovery-phrase');
```

or provide `NIXGO9_ADMIN_RECOVERY_CODE` as an environment variable.

Do not use a public/default recovery phrase.

## Customer account database

The customer authentication layer automatically creates these tables the first time a customer authentication page needs them:

- `nix_customers`
- `nix_customer_password_resets`

No manual SQL import is required for those tables.

## Existing order tables

The existing order system remains based on:

- `nix_orders`
- `nix_order_items`
- `nix_order_events`

## Public flow

A visitor attempting to open the public website is sent to:

`age-gate.php`

After confirming the applicable age requirement, the visitor can enter the site.

Guest browsing and guest checkout remain available. Creating a customer account is optional.

## Admin flow

Use:

`/admin/`

The admin account continues to come from the existing:

`admin_users`

table.

Allowed roles remain:

- admin
- owner
- super_admin

## Important

The age gate is an access-control UX, not a substitute for jurisdiction-specific legal compliance or robust age verification where required. Product availability and sales should remain subject to applicable law.

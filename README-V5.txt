# NIXGO9 V5 — Customer Tracking Experience

## Files

Upload these files into the existing project:

- `track-order.php` -> project root
- `includes/core/tracking-data.php` -> `includes/core/`
- `assets/css/tracking.css` -> `assets/css/`
- `assets/js/tracking.js` -> `assets/js/`

## First test

Because the current V4 admin test order is order ID 1, open:

`https://test.wordpressforall.com/track-order.php?id=1`

The adapter includes a development-only fallback for order ID 1 using the order journey already tested in the V4 admin panel.

## Important

Do NOT expose sequential order IDs as the permanent public customer URL.

The production target is:

`/track-order.php?token=<random-public-token>`

The token lookup hooks are already prepared in `tracking-data.php`.

## Live backend integration

`tracking-data.php` intentionally acts as an adapter. It attempts common V4 order lookup function names from:

`includes/core/order-db.php`

If the existing V4 function has a different name or return structure, only this adapter should need modification.

Do not modify the admin order workflow just to create the customer UI.

## Next V5 backend step

After the visual page is approved:

1. Add a random public tracking token to each order.
2. Add a customer-safe JSON tracking endpoint.
3. Poll it every 30 seconds while the page is open.
4. Refresh the timeline/status only when data actually changes.
5. Add real carrier tracking URLs when available.
6. Remove the development ID fallback before production launch.

## Design

The page follows the existing NIXGO9 warm ivory / botanical green / premium gold language and is mobile-first.

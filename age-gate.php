<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/core/config.php';
require_once __DIR__ . '/includes/core/age-gate.php';

nix_age_session_start();

$next = (string)($_GET['next'] ?? '');
if ($next === '') {
    $next = 'index.php';
}

if ((($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST')) {
    $answer = (string)($_POST['age_answer'] ?? '');

    if ($answer === 'yes') {
        $_SESSION['nix_age_verified'] = true;
        $_SESSION['nix_age_verified_at'] = time();

        if (
            str_contains($next, "\r")
            || str_contains($next, "\n")
            || !str_starts_with($next, '/')
        ) {
            $next = 'index.php';
        }

        if (str_starts_with($next, '/')) {
            $base = rtrim((string)BASE_URL, '/');
            $next = $base . $next;
        } else {
            $next = BASE_URL . ltrim($next, '/');
        }

        header('Location: ' . $next, true, 302);
        exit;
    }

    $_SESSION['nix_age_verified'] = false;
    $denied = true;
} else {
    $denied = false;
}

$base = rtrim((string)BASE_URL, '/') . '/';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>18+ | NIXGO9</title>
<link rel="stylesheet" href="<?= htmlspecialchars($base) ?>assets/css/auth.css">
</head>
<body class="gate-page">
<main class="gate-shell">
    <div class="gate-orb gate-orb-one"></div>
    <div class="gate-orb gate-orb-two"></div>

    <section class="gate-card">
        <div class="gate-brand">
            <span>N</span>
            <div><strong>NIXGO9</strong><small>PREMIUM NICOTINE EXPERIENCE</small></div>
        </div>

        <div class="gate-index">ENTRY / 01</div>

        <div class="gate-mark">18+</div>

        <p class="auth-eyebrow"><i></i> AGE-RESTRICTED EXPERIENCE</p>

        <h1>Before you<br><em>enter.</em></h1>

        <p class="gate-lead">
            This website contains information about nicotine products and is intended
            only for adults. You must be 18 or older, or meet the minimum legal age
            applicable in your location, to continue.
        </p>

        <div class="gate-note">
            <span>PLEASE NOTE</span>
            <p>
                Products and availability are subject to applicable local laws,
                regulations and age restrictions. If nicotine products are not
                permitted for you in your location, please do not continue.
            </p>
        </div>

        <?php if ($denied): ?>
            <div class="auth-alert">
                You must meet the applicable age requirement to enter NIXGO9.
            </div>
        <?php endif; ?>

        <form method="post" class="gate-actions">
            <input type="hidden" name="age_answer" value="yes">
            <button class="auth-primary" type="submit">
                <span>Yes, I am 18+</span><b>→</b>
            </button>
        </form>

        <a class="gate-exit" href="<?= htmlspecialchars($base) ?>age-gate.php?denied=1">
            I am under 18 / I cannot confirm
        </a>

        <footer class="auth-footer">
            <span>18+ ONLY</span>
            <span>NIXGO9 · 3G ENTERPRISES</span>
        </footer>
    </section>
</main>
</body>
</html>

<?php
$admin     = current_admin();
$pageTitle = $pageTitle ?? lang('page.dashboard');
$pageDesc  = $pageDesc ?? '';
$active    = $active ?? 'dashboard';
$flash     = flash_get();
$initial   = mb_strtoupper(mb_substr((string) ($admin['username'] ?? 'A'), 0, 1));
$nav = [
    ['id' => 'dashboard', 'href' => 'admin/dashboard.php', 'icon' => 'bi-grid-1x2', 'label' => lang('nav.dashboard')],
    ['id' => 'create', 'href' => 'admin/create.php', 'icon' => 'bi-plus-circle', 'label' => lang('nav.create')],
    ['id' => 'reminders', 'href' => 'admin/reminders.php', 'icon' => 'bi-alarm', 'label' => lang('nav.reminders')],
    ['id' => 'users', 'href' => 'admin/users.php', 'icon' => 'bi-people', 'label' => lang('nav.users')],
    ['id' => 'logs', 'href' => 'admin/logs.php', 'icon' => 'bi-journal-text', 'label' => lang('nav.logs')],
    ['id' => 'settings', 'href' => 'admin/settings.php', 'icon' => 'bi-telegram', 'label' => lang('nav.settings')],
    ['id' => 'admins', 'href' => 'admin/admins.php', 'icon' => 'bi-shield-lock', 'label' => lang('nav.admins')],
];
?>
<!DOCTYPE html>
<html lang="<?= e(lang('html_lang')) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> · <?= e(APP_NAME) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= e(base_url('assets/css/style.css')) ?>">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <span class="brand-mark"><i class="bi bi-send-fill"></i></span>
            <div>
                <strong><?= e(APP_NAME) ?></strong>
                <small><?= e(lang('brand.tagline')) ?></small>
            </div>
        </div>
        <div class="nav-label"><?= e(lang('nav.menu')) ?></div>
        <nav class="side-nav">
            <?php foreach ($nav as $item): ?>
                <a href="<?= e(base_url($item['href'])) ?>" class="<?= $active === $item['id'] ? 'active' : '' ?>">
                    <span class="nav-ico"><i class="bi <?= e($item['icon']) ?>"></i></span>
                    <?= e($item['label']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <div class="side-foot">
            <div class="side-user">
                <span class="avatar"><?= e($initial) ?></span>
                <div>
                    <strong><?= e($admin['username'] ?? '') ?></strong>
                    <a class="logout-link" href="<?= e(base_url('admin/logout.php')) ?>"><?= e(lang('nav.logout')) ?></a>
                </div>
            </div>
        </div>
    </aside>
    <div class="main-wrap">
        <header class="topbar">
            <button class="btn btn-sm sidebar-toggle" type="button" id="sidebarToggle"><i class="bi bi-list"></i></button>
            <div>
                <h1><?= e($pageTitle) ?></h1>
                <?php if ($pageDesc): ?><p class="sub"><?= e($pageDesc) ?></p><?php endif; ?>
            </div>
            <div class="topbar-meta">
                <?= lang_switcher() ?>
                <span class="clock-chip"><i class="bi bi-clock"></i> <span id="liveClock"></span></span>
            </div>
        </header>
        <main class="page-content">
            <?php if ($flash): ?>
                <div class="alert alert-<?= e($flash['type'] === 'success' ? 'success' : 'danger') ?> alert-dismissible fade show">
                    <?= e($flash['message']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

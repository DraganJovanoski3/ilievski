<?php
/**
 * Header Include
 * Sets up SEO metadata and includes head section
 */

// Default values
$page_title = isset($page_title) ? $page_title : 'Јован Илиески - Македонски Писател';
$page_description = isset($page_description) ? $page_description : 'Откријте ги делата на Јован Илиески. Истражете книги, прочитајте делови и поврзете се со авторот.';
$page_keywords = isset($page_keywords) ? $page_keywords : 'автор, книги, литература, македонски писател';
$page_image = isset($page_image) ? $page_image : 'assets/images/og-default.jpg';
$page_url = isset($page_url) ? $page_url : 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <meta name="author" content="Јован Илиески">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo htmlspecialchars($page_url); ?>">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- JSON-LD Schema -->
    <?php if (isset($json_ld)): ?>
        <script type="application/ld+json">
        <?php echo json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
        </script>
    <?php endif; ?>
</head>
<body>
    <header class="header">
        <div class="header-content">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="Јован Илиески Лого" class="logo-img">
            </a>
            <?php include 'includes/nav.php'; ?>
        </div>
    </header>










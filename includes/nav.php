<?php
/**
 * Navigation Include
 * Handles active state based on current page
 */

$current_page = basename($_SERVER['PHP_SELF']);
$nav_items = [
    'Почетна' => 'index.php',
    'Книги' => 'books.php',
    'Категории' => 'categories.php',
    'Медиуми' => 'media.php',
    'За Авторот' => 'about.php',
    'Контакт' => 'contact.php'
];
?>
<nav class="nav" id="mainNav">
    <ul class="nav-list">
        <?php foreach ($nav_items as $label => $url): ?>
            <li class="nav-item">
                <a href="<?php echo $url; ?>" 
                   class="nav-link <?php echo ($current_page === basename($url)) ? 'active' : ''; ?>">
                    <?php echo htmlspecialchars($label); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
    <span>☰</span>
</button>
<div class="mobile-nav-overlay" id="mobileNavOverlay"></div>










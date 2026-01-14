<?php
/**
 * Categories Page
 * Lists all book categories
 */

$page_title = 'Категории - Илиески';
$page_description = 'Разгледајте книги по категории. Истражете романи, поезија, мистерии и многу повеќе литературни жанрови.';
$page_keywords = 'категории, жанрови, романи, поезија, мистерии, книги, македонска литература';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Load books data
require_once 'data/books.php';

$categories = getCategories($books);

// Count books per category
$category_counts = [];
foreach ($categories as $category) {
    $category_counts[$category] = count(getBooksByCategory($books, $category));
}

include 'includes/header.php';
?>

<main>
    <section class="categories-section">
        <div class="container">
            <div class="section-title">
                <h2>Категории на Книги</h2>
                <p>Истражете ја нашата колекција организирана по жанр</p>
            </div>
            
            <div class="categories-grid">
                <?php foreach ($categories as $category): ?>
                    <a href="books.php?category=<?php echo urlencode($category); ?>" class="category-card fade-in">
                        <h3 class="category-name"><?php echo htmlspecialchars($category); ?></h3>
                        <p class="category-count"><?php echo $category_counts[$category]; ?> <?php echo $category_counts[$category] === 1 ? 'книга' : 'книги'; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>










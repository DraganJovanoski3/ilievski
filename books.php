<?php
/**
 * Books Page
 * Displays all books in a grid
 */

$page_title = 'Книги - Илиески';
$page_description = 'Разгледајте ја комплетната колекција на книги од Јован Илиески. Истражете романи, поезија и многу повеќе.';
$page_keywords = 'книги, колекција, романи, поезија, литература, македонски автор';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Load books data
require_once 'data/books.php';

// Filter by category if provided
$filter_category = isset($_GET['category']) ? $_GET['category'] : null;
$display_books = $filter_category ? getBooksByCategory($books, $filter_category) : $books;

// JSON-LD Schema for Book Collection
$json_ld = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Books by Ilievski',
    'description' => $page_description,
    'url' => $page_url
];

include 'includes/header.php';
?>

<main>
    <section class="books-section">
        <div class="container">
            <div class="section-title">
                <h2><?php echo $filter_category ? 'Книги: ' . htmlspecialchars($filter_category) : 'Сите Книги'; ?></h2>
                <p>Истражете ја комплетната колекција на литературни дела</p>
            </div>
            
            <?php if ($filter_category): ?>
                <div style="text-align: center; margin-bottom: 2rem;">
                    <a href="books.php" class="btn-more">← Погледни ги сите книги</a>
                </div>
            <?php endif; ?>
            
            <div class="books-grid">
                <?php foreach ($display_books as $book): ?>
                    <article class="book-card fade-in">
                        <div class="book-cover">
                            <img src="<?php echo htmlspecialchars($book['cover']); ?>" 
                                 alt="<?php echo htmlspecialchars($book['title']); ?> cover">
                        </div>
                        <div class="book-info">
                            <span class="book-category"><?php echo htmlspecialchars($book['category']); ?></span>
                            <h3 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h3>
                            <?php if (isset($book['publisher'])): ?>
                                <p class="book-publisher"><?php echo htmlspecialchars($book['publisher']); ?> 
                                <?php if (isset($book['year'])): ?>
                                    (<?php echo htmlspecialchars($book['year']); ?>)
                                <?php endif; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (isset($book['availability']) && !empty($book['availability'])): ?>
                                <p class="book-availability">
                                    <strong>Достапност:</strong> <?php echo htmlspecialchars($book['availability']); ?>
                                </p>
                            <?php endif; ?>
                            <p class="book-description"><?php echo htmlspecialchars($book['description']); ?></p>
                            <div class="book-actions">
                                <a href="book.php?id=<?php echo $book['id']; ?>" class="btn-more">Повеќе Детали</a>
                                <?php if (isset($book['purchase_links']) && !empty($book['purchase_links'])): ?>
                                    <?php foreach ($book['purchase_links'] as $link): ?>
                                        <a href="<?php echo htmlspecialchars($link['url']); ?>" 
                                           target="_blank" 
                                           rel="noopener noreferrer" 
                                           class="btn-buy">Купи - <?php echo htmlspecialchars($link['name']); ?></a>
                                    <?php endforeach; ?>
                                <?php elseif (isset($book['external_link']) && !empty($book['external_link'])): ?>
                                    <a href="<?php echo htmlspecialchars($book['external_link']); ?>" 
                                       target="_blank" 
                                       rel="noopener noreferrer" 
                                       class="btn-buy">Купи</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>










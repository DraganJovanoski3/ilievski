<?php
/**
 * Single Book Page
 * Displays detailed information about a specific book
 */

// Load books data
require_once 'data/books.php';

// Get book ID from URL
$book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$book = getBookById($books, $book_id);

// If book not found, redirect to books page
if (!$book) {
    header('Location: books.php');
    exit;
}

$page_title = $book['title'] . ' - Илиески';
$page_description = $book['description'];
$page_keywords = $book['category'] . ', ' . $book['title'] . ', book, literature';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_image = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $book['cover'];

// JSON-LD Schema for Book
$json_ld = [
    '@context' => 'https://schema.org',
    '@type' => 'Book',
    'name' => $book['title'],
    'description' => $book['description'],
    'author' => [
        '@type' => 'Person',
        'name' => 'Ilievski'
    ],
    'bookFormat' => 'https://schema.org/Hardcover',
    'genre' => $book['category'],
    'url' => $page_url,
    'image' => $page_image
];

include 'includes/header.php';
?>

<main>
    <section class="book-detail">
        <div class="book-detail-content">
            <div class="book-detail-cover-wrapper">
                <img src="<?php echo htmlspecialchars($book['cover']); ?>" 
                     alt="<?php echo htmlspecialchars($book['title']); ?> cover"
                     class="book-detail-cover">
            </div>
            
            <div class="book-detail-info">
                <span class="book-detail-category"><?php echo htmlspecialchars($book['category']); ?></span>
                <h1><?php echo htmlspecialchars($book['title']); ?></h1>
                <?php if (isset($book['publisher'])): ?>
                    <p class="book-publisher-detail">
                        <strong>Издавач:</strong> <?php echo htmlspecialchars($book['publisher']); ?> 
                        <?php if (isset($book['year'])): ?>
                            (<?php echo htmlspecialchars($book['year']); ?>)
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
                <?php if (isset($book['availability']) && !empty($book['availability'])): ?>
                    <p class="book-availability-detail">
                        <strong>Достапност:</strong> <?php echo htmlspecialchars($book['availability']); ?>
                    </p>
                <?php endif; ?>
                <p class="book-detail-description"><?php echo htmlspecialchars($book['description']); ?></p>
                
                <?php if (isset($book['quote']) && !empty($book['quote'])): ?>
                    <blockquote class="book-quote">
                        <?php echo htmlspecialchars($book['quote']); ?>
                    </blockquote>
                <?php endif; ?>
                
                <div class="book-detail-actions">
                    <?php if (isset($book['purchase_links']) && !empty($book['purchase_links'])): ?>
                        <?php foreach ($book['purchase_links'] as $link): ?>
                            <a href="<?php echo htmlspecialchars($link['url']); ?>" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="btn-buy">Купи на <?php echo htmlspecialchars($link['name']); ?></a>
                        <?php endforeach; ?>
                    <?php elseif (isset($book['external_link']) && !empty($book['external_link'])): ?>
                        <a href="<?php echo htmlspecialchars($book['external_link']); ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn-buy">Купи Книга</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>










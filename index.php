<?php
/**
 * Home Page
 */

$page_title = 'Почетна - Илиески';
$page_description = 'Добредојдовте на официјалната веб-страница на Јован Илиески. Откријте фасцинантни книги, истражете литературни дела и поврзете се со авторот.';
$page_keywords = 'автор, книги, литература, почетна, македонски писател';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Load books data
require_once 'data/books.php';

// Get featured books (first 3)
$featured_books = array_slice($books, 0, 3);

include 'includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content fade-in">
            <h1 class="hero-title">Јован Илиески</h1>
            <p class="hero-subtitle-small">Психолог. Писател. Психотерапевт.</p>
            <p class="hero-subtitle">Напишани Светови</p>
            <a href="books.php" class="hero-cta">Истражи Книги</a>
        </div>
    </section>

    <!-- Popular/Most Read Book Section -->
    <section class="popular-book-section">
        <div class="container">
            <div class="section-title">
                <h2>Популарно</h2>
                <p>Најчитана книга</p>
            </div>
            <?php
            // Find "Татко ми, Босфор" book
            $popular_book = null;
            foreach ($books as $book) {
                if (stripos($book['title'], 'Татко ми') !== false || stripos($book['title'], 'Босфор') !== false) {
                    $popular_book = $book;
                    break;
                }
            }
            if ($popular_book):
            ?>
            <div class="popular-book-featured fade-in">
                <div class="popular-book-cover">
                    <img src="<?php echo htmlspecialchars($popular_book['cover']); ?>" 
                         alt="<?php echo htmlspecialchars($popular_book['title']); ?> cover">
                </div>
                <div class="popular-book-info">
                    <span class="popular-badge">🔥 Најчитано</span>
                    <h3 class="popular-book-title"><?php echo htmlspecialchars($popular_book['title']); ?></h3>
                    <p class="popular-book-meta">
                        <span><?php echo htmlspecialchars($popular_book['publisher']); ?></span>
                        <span class="separator">•</span>
                        <span><?php echo htmlspecialchars($popular_book['year']); ?></span>
                    </p>
                    <p class="popular-book-excerpt"><?php echo htmlspecialchars(mb_substr($popular_book['description'], 0, 300, 'UTF-8')); ?>...</p>
                    <div class="popular-book-actions">
                        <a href="book.php?id=<?php echo $popular_book['id']; ?>" class="btn-more">Повеќе Детали</a>
                        <a href="<?php echo htmlspecialchars($popular_book['external_link']); ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn-buy">Купи</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Featured Books Section -->
    <section class="books-section">
        <div class="container">
            <div class="section-title">
                <h2>Избрани Дела</h2>
                <p>Откријте селекција на фасцинантни приказни кои ги допреле срцата на читателите</p>
            </div>
            
            <div class="books-grid">
                <?php foreach ($featured_books as $book): ?>
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
                            <p class="book-description"><?php echo htmlspecialchars($book['description']); ?></p>
                            <div class="book-actions">
                                <a href="book.php?id=<?php echo $book['id']; ?>" class="btn-more">Повеќе Детали</a>
                                <a href="<?php echo htmlspecialchars($book['external_link']); ?>" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   class="btn-buy">Купи</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- About Preview Section -->
    <section class="home-about-section">
        <div class="container">
            <div class="home-about-content">
                <div class="home-about-image fade-in">
                    <img src="assets/images/auther-image-1.jpg" alt="Ilievski Author" class="about-preview-img">
                </div>
                <div class="home-about-text fade-in">
                    <h2>За Авторот</h2>
                    <p class="lead">Јован Илиески е македонски писател и литератор чијшто дебитантски роман, според критичарите, го одредува како обид за модерна литература.</p>
                    <p>Творештвото на најмладите автори било секогаш различно од старата генерација, различно и подлабоко анализирано во литературата.</p>
                    <a href="about.php" class="btn-more">Прочитај повеќе</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Preview Section -->
    <section class="home-categories-section">
        <div class="container">
            <div class="section-title">
                <h2>Истражувај по Категорија</h2>
                <p>Одбери ја категоријата која те интересира</p>
            </div>
            <div class="home-categories-grid">
                <?php
                $categories = getCategories($books);
                $category_counts = [];
                foreach ($categories as $category) {
                    $category_counts[$category] = count(getBooksByCategory($books, $category));
                }
                // Show first 4 categories
                $display_categories = array_slice($categories, 0, 4);
                foreach ($display_categories as $category):
                ?>
                    <a href="books.php?category=<?php echo urlencode($category); ?>" class="home-category-card fade-in">
                        <div class="category-icon">📚</div>
                        <h3 class="category-name"><?php echo htmlspecialchars($category); ?></h3>
                        <p class="category-count"><?php echo $category_counts[$category]; ?> книги</p>
                    </a>
                <?php endforeach; ?>
            </div>
            <div style="text-align: center; margin-top: 3rem;">
                <a href="categories.php" class="btn-more">Погледни ги сите категории</a>
            </div>
        </div>
    </section>

    <!-- Latest Books Section -->
    <section class="home-latest-section">
        <div class="container">
            <div class="section-title">
                <h2>Најнови Книги</h2>
                <p>Последни објавени дела</p>
            </div>
            <div class="latest-books-grid">
                <?php
                // Get latest 4 books (last items in array)
                $latest_books = array_slice($books, -4);
                $latest_books = array_reverse($latest_books);
                foreach ($latest_books as $book):
                ?>
                    <article class="latest-book-card fade-in">
                        <a href="book.php?id=<?php echo $book['id']; ?>" class="latest-book-link">
                            <div class="latest-book-cover">
                                <img src="<?php echo htmlspecialchars($book['cover']); ?>" 
                                     alt="<?php echo htmlspecialchars($book['title']); ?> cover">
                            </div>
                            <div class="latest-book-info">
                                <span class="latest-book-badge">Ново</span>
                                <h3 class="latest-book-title"><?php echo htmlspecialchars($book['title']); ?></h3>
                                <?php if (isset($book['year'])): ?>
                                    <span class="latest-book-year"><?php echo htmlspecialchars($book['year']); ?></span>
                                <?php endif; ?>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
            <div style="text-align: center; margin-top: 3rem;">
                <a href="books.php" class="btn-buy">Погледни ги сите книги</a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>


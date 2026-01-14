<?php
/**
 * Contact Page
 * Contact form with PHP email handling
 */

$page_title = 'Контакт - Илиески';
$page_description = 'Стапете во контакт со Јован Илиески. Испратете порака, поставете прашања или споделете ги вашите мисли за книгите.';
$page_keywords = 'контакт, порака, е-пошта, стапи во контакт, автор';
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$form_submitted = false;
$form_error = '';
$form_success = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        $form_error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_error = 'Please enter a valid email address.';
    } else {
        // Sanitize inputs
        $name = htmlspecialchars($name);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($message);
        
        // Email configuration
        $to = 'author@example.com'; // Change this to your email
        $subject = 'Contact Form Submission from ' . $name;
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message\n";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Send email
        if (mail($to, $subject, $email_message, $headers)) {
            $form_success = true;
            $name = '';
            $email = '';
            $message = '';
        } else {
            $form_error = 'Sorry, there was an error sending your message. Please try again later.';
        }
    }
}

include 'includes/header.php';
?>

<main>
    <section class="contact-section">
        <div class="contact-content">
            <div class="section-title">
                <h2>Стапи во Контакт</h2>
                <p>Би сакал да слушнам од вас. Испратете ми порака и ќе одговорам што е можно поскоро.</p>
            </div>
            
            <form class="contact-form fade-in" method="POST" action="contact.php" id="contactForm" novalidate>
                <?php if ($form_success): ?>
                    <div class="form-success show">
                        Ви благодарам за вашата порака! Ќе ви одговорам наскоро.
                    </div>
                <?php endif; ?>
                
                <?php if ($form_error): ?>
                    <div class="form-error show">
                        <?php echo htmlspecialchars($form_error); ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name" class="form-label">Име *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-input" 
                           required
                           placeholder="Вашето име"
                           value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                    <span class="form-error" id="nameError"></span>
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Е-пошта *</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-input" 
                           required
                           placeholder="vasaemail@example.com"
                           value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                    <span class="form-error" id="emailError"></span>
                </div>
                
                <div class="form-group">
                    <label for="message" class="form-label">Порака *</label>
                    <textarea id="message" 
                              name="message" 
                              class="form-textarea" 
                              required
                              placeholder="Вашата порака..."><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                    <span class="form-error" id="messageError"></span>
                </div>
                
                <button type="submit" class="form-submit">Испрати Порака</button>
            </form>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>


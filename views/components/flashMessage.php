<?php
// Start the session if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function flashMessage()
{
    // Check if the flash message is set in the session
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message']['message'];
        $type = $_SESSION['flash_message']['type'];

        ?>
        <div class="flash-container container">
            <div class="alert alert-<?= htmlspecialchars($type) ?> alert-dismissible fade" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        </div>
        <?php

        // Unset the flash message after displaying it
        unset($_SESSION['flash_message']);
    }
}

flashMessage();
?>

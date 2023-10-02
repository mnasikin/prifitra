// Validate captcha when "enter" button pressed
function validateForm() {
    var userAnswer = document.forms["captchaForm"]["captcha_answer"].value;
    var captchaAnswer = <?php echo $_SESSION['captcha_answer']; ?>;
    
    if (parseInt(userAnswer) === captchaAnswer) {
        return true; // Allow send form
    } else {
        alert("CAPTCHA salah. Coba lagi.");
        return false; // Disallow send form
    }
}

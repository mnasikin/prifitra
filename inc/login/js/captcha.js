// Fungsi JavaScript untuk melakukan validasi saat tombol "Enter" ditekan
function validateForm() {
    var userAnswer = document.forms["captchaForm"]["captcha_answer"].value;
    var captchaAnswer = <?php echo $_SESSION['captcha_answer']; ?>;
    
    if (parseInt(userAnswer) === captchaAnswer) {
        return true; // Izinkan pengiriman formulir
    } else {
        alert("CAPTCHA salah. Coba lagi.");
        return false; // Mencegah pengiriman formulir
    }
}

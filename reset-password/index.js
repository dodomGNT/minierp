function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

document.querySelector('form').onsubmit = function() {
    const p1 = document.getElementById('new_password').value;
    const p2 = document.getElementById('confirm_new_password').value;
    if (p1 !== p2) {
        alert("Password baru dan konfirmasi tidak cocok!");
        return false;
    }
    return true;
};
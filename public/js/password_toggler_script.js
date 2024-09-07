function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var toggleButton = passwordInput.nextElementSibling.querySelector('i');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.classList.remove('fa-eye');
        toggleButton.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleButton.classList.remove('fa-eye-slash');
        toggleButton.classList.add('fa-eye');
    }
}

function toggleConfirmPasswordVisibility() {
    var confirmPasswordInput = document.getElementById('confirm_password');
    var toggleButton = confirmPasswordInput.nextElementSibling.querySelector('i');

    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
        toggleButton.classList.remove('fa-eye');
        toggleButton.classList.add('fa-eye-slash');
    } else {
        confirmPasswordInput.type = 'password';
        toggleButton.classList.remove('fa-eye-slash');
        toggleButton.classList.add('fa-eye');
    }}
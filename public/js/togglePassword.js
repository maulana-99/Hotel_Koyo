function showHidePassword(togglerId, passwordId) {
    var password = document.getElementById(passwordId);
    var toggler = document.getElementById(togglerId);
    if (password.type == 'password') {
        password.setAttribute('type', 'text');
        toggler.classList.add('fa-eye-slash');
    } else {
        toggler.classList.remove('fa-eye-slash');
        password.setAttribute('type', 'password');
    }
}

// Attach event listeners
document.getElementById('toggler1').addEventListener('click', function() {
    showHidePassword('toggler1', 'password');
});

document.getElementById('toggler2').addEventListener('click', function() {
    showHidePassword('toggler2', 'password_confirmation');
});

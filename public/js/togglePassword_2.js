document.addEventListener('DOMContentLoaded', (event) => {
    var password = document.getElementById('fakePassword');
    var toggler = document.getElementById('toggler');

    var showHidePassword = () => {
        if (password.type === 'password') {
            password.setAttribute('type', 'text');
            toggler.classList.add('fa-eye-slash');
            toggler.classList.remove('fa-eye');
        } else {
            toggler.classList.remove('fa-eye-slash');
            toggler.classList.add('fa-eye');
            password.setAttribute('type', 'password');
        }
    };

    toggler.addEventListener('click', showHidePassword);
});
  
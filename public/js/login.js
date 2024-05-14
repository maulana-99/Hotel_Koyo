document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting in the traditional way
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    // Simple check (replace this with your actual authentication logic)
    if (email === 'admin@example.com' && password === 'password123') {
        alert('Login successful!');
        // Redirect to another page or perform any other desired action
    } else {
        errorMessage.textContent = 'Invalid email or password';
    }
});


document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const password = document.querySelector('input[name="password"]').value;

    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return;
    }

    if (!/[A-Z]/.test(password)) {
        alert('Password must contain at least one uppercase letter.');
        return;
    }

    if (!/\d/.test(password)) {
        alert('Password must contain at least one digit.');
        return;
    }

    this.submit();
});
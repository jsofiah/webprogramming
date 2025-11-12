const form = document.getElementById('registerForm');
form.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Registration successful! Thank you for joining LYVESTA.');
    form.reset();
});
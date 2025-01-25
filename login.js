const loginForm = document.getElementById('loginForm');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const usernameError = document.getElementById('usernameError');
const passwordError = document.getElementById('passwordError');

loginForm.addEventListener('submit', async function(event) {
    event.preventDefault();
    resetErrors();

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    try {
        const response = await fetch('/projet/public/users.php?action=login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, password }),
        });

        const result = await response.json();

        if (response.ok) {
            alert("Login Successful!");
            window.location.href = '/projet/index.html'; // Redirect to the same URL for all roles
        } else {
            // Display error message for incorrect login
            const errorMessage = result.message || "Invalid username or password.";
            setError(passwordInput, passwordError, errorMessage);
        }
    } catch (error) {
        console.error("Login error:", error);
        alert("An error occurred. Please try again.");
    }
});

function resetErrors() {
    usernameError.textContent = '';
    passwordError.textContent = '';
    usernameInput.style.border = '';
    passwordInput.style.border = '';
}

function setError(input, errorElement, message) {
    errorElement.textContent = message;
    input.style.border = '2px solid red';
}

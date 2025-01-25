const form = document.getElementById('registrationForm');
const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const usernameError = document.getElementById('usernameError');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');

async function validForm(event) {
    event.preventDefault();
    reset();

    const newUser = {
        username: usernameInput.value.trim(),
        email: emailInput.value.trim(),
        password: passwordInput.value.trim(),
    };

    try {
        const response = await fetch('/projet/public/users.php?action=register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newUser),
        });

        const result = await response.json();

        if (response.ok) {
            alert("Registration Successful!");
            window.location.href = '/projet/index.html';
        } else {
            alert(result.message || "Registration Failed!");
        }
    } catch (error) {
        console.error("Error during registration:", error);
        alert("Something went wrong. Please try again.");
    }
}

form.addEventListener('submit', validForm);

function reset() {
    usernameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
}

function setError(input, errorElement, message) {
    errorElement.textContent = message;
    input.style.border = '2px solid red';
}

// DOM Elements
const form = document.querySelector('form');  // Ensure the form exists
const emailInput = document.getElementById('email');  // Correct the reference
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('pwd');


document.addEventListener('DOMContentLoaded', function () {
    const signUpBtn = document.querySelector('.login');
    
    signUpBtn.addEventListener('click', function () {
        window.location.href = 'login.html';
    });
});
    
// Ensure the form is correctly selected
if (form) {
    // Form validation and submission to the backend (signup.php)
    form.addEventListener('submit', function (e) {
        // Perform client-side validation
        const email = emailInput.value;  // Correct the email input reference
        const username = usernameInput.value;
        const password = passwordInput.value;

        // Check for validation
        if (!validateEmail(email)) {
            e.preventDefault();  // Prevent form submission
            alert('Please enter a valid email address.');
        } else if (username.length < 3) {
            e.preventDefault();  // Prevent form submission
            alert('Username must be at least 3 characters long.');
        } else if (password.length < 6) {
            e.preventDefault();  // Prevent form submission
            alert('Password must be at least 6 characters long.');
        } else {
            // No need for preventDefault here, as we're submitting the form to the backend (signup.php)
            // The form will be submitted and handled by the PHP backend
            // If you want to use AJAX to handle the submission without reloading the page, you would need to manually handle it.
        }
    });
} else {
    console.error('Form not found!');
}

// Validation function for email
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
}

// Event listener for the login button (optional functionality)
document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.querySelector('button.log-in');
    
    if (loginButton) {
        loginButton.addEventListener('click', function () {
            window.location.href = 'login.html';  // Redirect to login page
        });
    } else {
        console.error('Login button not found!');
    }
});


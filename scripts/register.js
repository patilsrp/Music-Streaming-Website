document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        let isValid = true;
        const usernameInput = form.querySelector('input[type="text"]');
        const emailInput = form.querySelector('input[type="email"]');
        const passwordInput = form.querySelector('input[type="password"]');
        const errorMessages = [];

        // Validation functions
        const validateUsername = () => {
            const username = usernameInput.value.trim();
            if (!username) {
                isValid = false;
                errorMessages.push("Username is required.");
            }
        };

        const validateEmail = () => {
            const email = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                isValid = false;
                errorMessages.push("Please enter a valid email address.");
            }
        };

        const validatePassword = () => {
            const password = passwordInput.value.trim();
            // Add password strength validation logic here if needed
            if (!password) {
                isValid = false;
                errorMessages.push("Password is required.");
            }
        };

        validateUsername();
        validateEmail();
        validatePassword();

        if (isValid) {
            // Here you can submit the form data to a server or process it locally
            console.log("Form is valid. Submitting...");
            // For example:
            const formData = {
                username: usernameInput.value.trim(),
                email: emailInput.value.trim(),
                password: passwordInput.value.trim()
            };
            console.log("Form Data:", formData);
            // Clear the form after successful submission
            form.reset();
            // Redirect to index.html after successful validation and submission
            console.log("Redirecting to index.html...");
            window.location.href = "../index.html"; // Make sure this path is correct
        } else {
            // Display error messages to the user
            console.error("Validation errors:", errorMessages.join(" "));
            // You can display these errors in the DOM or using alerts/toasts
            // For simplicity, let's log them to the console here
        }
    });
});

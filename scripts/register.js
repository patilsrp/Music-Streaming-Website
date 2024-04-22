document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form");
    form.addEventListener("submit", function(event) {
 
        event.preventDefault();


        let isValid = true;
        const username = form.querySelector('input[type="text"]').value.trim();
        const email = form.querySelector('input[type="email"]').value.trim();
        const password = form.querySelector('input[type="password"]').value.trim();
        const errorMessages = [];

        if (!username) {
            isValid = false;
            errorMessages.push("Username is required.");
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailRegex.test(email)) {
            isValid = false;
            errorMessages.push("Please enter a valid email address.");
        }

        if (!password) {
            isValid = false;
            errorMessages.push("Password is required.");
        }

        if (isValid) {

            console.log("Form is valid. Submitting...");
        } else {

            console.error("Validation errors:", errorMessages.join(" "));
        }
    });
});
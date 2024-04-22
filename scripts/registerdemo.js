document.getElementById('signup-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const email = document.getElementById('email');
    const phone = document.getElementById('phone');

    let hasError = false;

    if (email.value.trim() === '') {
        document.getElementById('email-error').innerText = 'Email is required.';
        hasError = true;
    } else if (!validateEmail(email.value)) {
        document.getElementById('email-error').innerText = 'Please enter a valid email address.';
        hasError = true;
    } else {
        document.getElementById('email-error').innerText = '';
    }

    if (phone.value.trim() !== '' && !validatePhone(phone.value)) {
        document.getElementById('phone-error').innerText = 'Please enter a valid phone number.';// Add your phone validation logic here
        hasError = true;
    } else {
        document.getElementById('phone-error').innerText = '';
    }

    if (!hasError) {
        // Submit the form
        console.log('Form submitted');
    }
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// Add your phone validation logic here
function validatePhone(phone) {
    // Implement your phone validation logic
}
// Show/hide password onClick of button using JavaScript only

function show() {
  var p = document.getElementById('pwd');
  p.setAttribute('type', 'text');
}

function hide() {
  var p = document.getElementById('pwd');
  p.setAttribute('type', 'password');
}

document.addEventListener('DOMContentLoaded', function () {
const signUpBtn = document.querySelector('.sign-up');

signUpBtn.addEventListener('click', function () {
    window.location.href = 'register.html';
});

document.getElementById("eye").addEventListener("click", function() {
  const passwordField = document.getElementById("pwd");
  if (passwordField.type === "password") {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
});
});

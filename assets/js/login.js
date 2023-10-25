document.addEventListener('DOMContentLoaded', function() {

  console.log("DOM LOADED");

  const emailForm = document.getElementById('email');
  const passwordForm = document.getElementById('pwd');
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.(com|net|org|info|edu|gov|...)$/;

  const loginForm = document.getElementById('login-form');

  loginForm.addEventListener('submit', function(event) {
    event.preventDefault(); 
    const email = emailForm.value;
    const password = passwordForm.value;

    if (email.trim() === "") {
      alert("Please enter an email address.");
    } else if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
    } else if (password.trim() === "") {
      alert("Please enter a password.");
    } else {
      // Если валидация успешна, можно отправить форму
      loginForm.submit();
    }
  });
});

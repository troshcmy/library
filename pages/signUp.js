document.addEventListener("DOMContentLoaded", function () {
  const signUpForm = document.getElementById("sign-up-form");

  if (signUpForm) {
    signUpForm.addEventListener("submit", function (event) {
      // Prevent the default form submission
      event.preventDefault();

      // Validate inputs
      const firstName = document.getElementById("first-name").value.trim();
      const lastName = document.getElementById("last-name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;

      let isValid = true;
      let errorMessage = "";

      if (!firstName || !lastName || !email || !password || !confirmPassword) {
        errorMessage = "All fields are required.";
        isValid = false;
      } else if (password.length < 8) {
        errorMessage = "Password must be at least 8 characters long.";
        isValid = false;
      } else if (!password.match(/[A-Za-z]/) || !password.match(/[0-9]/) || !password.match(/[\!\@\#\$\%\^\&\*\(\)\-\_\+\=\[\]\{\}\;\:\'\"\\\|\,\<\.\>\/\?\~]/)) {
        errorMessage = "Password must contain letters, numbers, and special characters.";
        isValid = false;
      } else if (password !== confirmPassword) {
        errorMessage = "Passwords do not match.";
        isValid = false;
      }

      if (isValid) {
        // Submit the form if validation passes
        signUpForm.submit();
      } else {
        // Show the error message
        alert(errorMessage);
      }
    });
  } else {
    console.log("Sign-up form not found");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM LOADED");

  const signupForm = document.getElementById("signup-form");
  const firstNameInput = document.getElementById("first-name");
  const lastNameInput = document.getElementById("last-name");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  // const retypePasswordInput = document.getElementById("retype-password");

  signupForm.addEventListener("submit", function (event) {
    // Проверка на валидность имени и фамилии
    if (
      !isValidName(firstNameInput.value) ||
      !isValidName(lastNameInput.value)
    ) {
      event.preventDefault();
      alert("First and last names should contain valid alpha characters only.");
    }

    if (firstNameInput.value.length > 20 || lastNameInput.value.length > 20) {
      event.preventDefault();
      alert(
        "First and last names should be no more than 20 characters in length."
      );
    }

    if (!isValidEmail(emailInput.value)) {
      event.preventDefault();
      alert("Invalid email format");
    }

    // if (passwordInput.value !== retypePasswordInput.value) {
    //   event.preventDefault();
    //   alert("Password do not match");
    // }

    const passwordValidation = isValidPassword(passwordInput.value);

    if (typeof passwordValidation === "string") {
      event.preventDefault();

      // Display the detailed message
      alert(`Password does not meet the requirements.\n${passwordValidation}`);
    }
  });

  function isValidName(name) {
    const nameRegex = /^[A-Za-z]+$/;
    return nameRegex.test(name);
  }

  function isValidEmail(email) {
    const emailRegex =
      /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.(com|net|org|info|edu|gov|...)$/;
    return emailRegex.test(email);
  }

  function isValidPassword(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasDigits = /\d/.test(password);
    const hasSpecialChars = /[!@#$%^&*]/.test(password);

    if (
      password.length >= minLength &&
      hasUpperCase &&
      hasLowerCase &&
      hasDigits &&
      hasSpecialChars
    ) {
      return true;
    }
      
    else {
      const errors = [];
      if (password.length < minLength) {
        errors.push("Password should be at least 8 characters long.");
      }
      if (!hasUpperCase) {
        errors.push("Password should contain at least one uppercase letter.");
      }
      if (!hasLowerCase) {
        errors.push("Password should contain at least one lowercase letter.");
      }
      if (!hasDigits) {
        errors.push("Password should contain at least one digit.");
      }
      if (!hasSpecialChars) {
        errors.push("Password should contain at least one special character.");
      }

      return errors.join("\n");
    }
  }
});

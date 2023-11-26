document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM LOADED");

  const signupForm = document.getElementById("signup-form");

  signupForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    // Reset error messages
    resetErrorMessages();

    let validInput = false;

    while (!validInput) {
      const formData = new FormData(signupForm);

      // Check the criteria for each field
      if (!isValidName(formData.get("first_name")) || !isValidName(formData.get("last_name"))) {
        displayErrorMessage("First and last names should contain valid alpha characters only.");
      } else if (formData.get("first_name").length > 20 || formData.get("last_name").length > 20) {
        displayErrorMessage("First and last names should be no more than 20 characters in length.");
      } else if (!isValidEmail(formData.get("email"))) {
        displayErrorMessage("Invalid email format");
      } else {
        let passwordValidation = isValidPassword(formData.get("password"));

        // If password is valid, set validInput to true to exit the loop
        if (typeof passwordValidation === "boolean" && passwordValidation) {
          validInput = true;
        } else {
          displayErrorMessage(`Password does not meet the requirements.\n${passwordValidation}`);
        }
      }

      // If not all criteria are met, break out of the loop and prevent form submission
      if (!validInput) {
        break;
      }
    }

    // If all conditions are met, submit the form
    if (validInput) {
      signupForm.submit();
    }
  });

  function isValidName(name) {
    const nameRegex = /^[A-Za-z]+$/;
    return nameRegex.test(name);
  }

  function isValidEmail(email) {
    // Improved email regex
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
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
    } else {
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

      // Display the errors in the HTML
      displayErrorMessage(errors.join("<br>"));

      // Return false if there are errors
      return false;
    }
  }

  function displayErrorMessage(message) {
    const errorMessageContainer = document.getElementById("error-message");
    errorMessageContainer.innerHTML = message;
  }

  function resetErrorMessages() {
    const errorMessageContainer = document.getElementById("error-message");
    errorMessageContainer.innerHTML = "";
  }
});

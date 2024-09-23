function isValidForgot(form) {
  // Get the input field and error span element
  const email = form.email.value;
  const emailError = document.getElementById("femailerr");

  // Clear previous error message
  emailError.innerHTML = "";

  // Flag to track if the form is valid
  let isFormValid = true;

  // Check if email is empty
  if (email.trim() === "") {
    emailError.innerHTML = "Email is required.";
    isFormValid = false;
  }

  // Simple email format validation
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!emailPattern.test(email)) {
    emailError.innerHTML = "Please enter a valid email address.";
    isFormValid = false;
  }

  // Return the validation result
  return isFormValid;
}

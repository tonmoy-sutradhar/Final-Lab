function isValidNewPass(form) {
  // Get the input fields and error span elements
  const newPassword = form["new-password"].value;
  const confirmPassword = form["confirm-password"].value;

  const newPassError = document.getElementById("new-pass-err");
  const confirmPassError = document.getElementById("confirm-pass-err");

  // Clear previous error messages
  newPassError.innerHTML = "";
  confirmPassError.innerHTML = "";

  // Flag to track if the form is valid
  let isFormValid = true;

  // Check if new password is empty
  if (newPassword.trim() === "") {
    newPassError.innerHTML = "New password is required.";
    isFormValid = false;
  }

  // Check if confirm password is empty
  if (confirmPassword.trim() === "") {
    confirmPassError.innerHTML = "Confirm password is required.";
    isFormValid = false;
  }

  // Check if new password and confirm password match
  if (newPassword !== confirmPassword) {
    confirmPassError.innerHTML = "Passwords do not match.";
    isFormValid = false;
  }

  // Return the validation result
  return isFormValid;
}

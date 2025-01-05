// ------------- Register form validation
function validateRegisterForm(e) {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  const address = document.getElementById('address').value;
  const tel = document.getElementById('tel').value;
  const terms = document.getElementById('terms').checked;

  let errorMessages = [];

  // Name validation
  if (!name) {
      errorMessages.push('Name is required.');
  }

  // Email validation
  if (!email.includes('@')) {
      errorMessages.push('Please enter a valid email address.');
  }

// Password validation (6-8 characters long, contain at least one uppercase letter, one numeric digit, one special character, and no spaces)
const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])(?=\S+$).{6,8}$/;
if (!passwordRegex.test(password)) {
    errorMessages.push('Password must be 6-8 characters long, contain at least one uppercase letter, one numeric digit, one special character, and no spaces.');
}
if (password !== confirmPassword) {
    errorMessages.push('Passwords do not match.');
}

  // Address validation
  if (!address) {
      errorMessages.push('Address is required.');
  }

  // Telephone validation
  const telRegex = /^[0-9]{10}$/;
  if (!telRegex.test(tel)) {
      errorMessages.push('Telephone must be a 10-digit number.');
  }

  // Terms and conditions validation
  if (!terms) {
      errorMessages.push('You must agree to the terms and conditions.');
  }

  // Show error messages if any
  if (errorMessages.length > 0) {
      e.preventDefault(); // Prevent form submission
      alert(errorMessages.join('\n'));
  }
}

// Attach validation function to the form submit event
document.querySelector('form').addEventListener('submit', validateRegisterForm);

// ------------- Login form validation
function validateLoginForm(e) {
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  let errorMessages = [];

  // Email validation
  if (!email.includes('@')) {
      errorMessages.push('Please enter a valid email address.');
  }

  // Password validation
  if (!password) {
      errorMessages.push('Please enter your password.');
  }

  // Show error messages if any
  if (errorMessages.length > 0) {
      e.preventDefault(); // Prevent form submission
      alert(errorMessages.join('\n'));
  }
}

//Show password
function showPassword() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirmPassword");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  }
  else {
    x.type = "password";
    y.type = "password";
  }
}


// Event listeners for forms
document.addEventListener('DOMContentLoaded', function () {
  const registerForm = document.getElementById('registerForm');
  const loginForm = document.getElementById('loginForm');

  if (registerForm) {
      registerForm.addEventListener('submit', validateRegisterForm);
  }

  if (loginForm) {
      loginForm.addEventListener('submit', validateLoginForm);
  }
});

// ------------- Forgot password form validation

document.addEventListener("DOMContentLoaded", () => {
    // Validation for Forgot Password Form
    const forgotPasswordForm = document.getElementById("forgotPasswordForm");
    if (forgotPasswordForm) {
      forgotPasswordForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const email = document.getElementById("email").value;
  
        if (!validateEmail(email)) {
          alert("Please enter a valid email address.");
          return;
        }
  
        // Simulate sending a password reset email
        alert(`A password reset link has been sent to ${email}.`);
        forgotPasswordForm.reset();
      });
    }
  
    // Utility Function for Email Validation
    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  

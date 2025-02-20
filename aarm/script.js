const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signup');

signUpButton.addEventListener('click', function () {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
});

signInButton.addEventListener('click', function () {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
});

// Function to add shake effect and display error message
function showError(container, message) {
    // Remove existing error messages
    const existingError = container.querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }

    // Force reflow before adding the shake effect again
    container.classList.remove('shake'); 
    void container.offsetWidth; // This forces a reflow

    // Add shake effect
    container.classList.add('shake');

    // Create and append error message
    const errorMessage = document.createElement('p');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    container.appendChild(errorMessage);

    // Remove shake effect after animation ends
    setTimeout(() => {
        container.classList.remove('shake');
    }, 500); // Match the duration of the shake animation

    // Remove error message after 3 seconds
    setTimeout(() => {
        errorMessage.remove();
    }, 3000);
}


// Example usage (you can call this function in your PHP logic when there's an error)
// showError(document.querySelector('.container'), 'Incorrect email or password');
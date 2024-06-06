const wrapper = document.querySelector('.wrapper');
const imageContainer = document.querySelector('.image-container');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

// Function to adjust the position of the image container
function adjustImageContainerPosition() {
    if (wrapper.classList.contains('active')) {
        imageContainer.classList.add('register-active'); // Add the class to adjust the position when the registration form is active
    } else {
        imageContainer.classList.remove('register-active'); // Remove the class when the login form is active
    }
}

// Event listener for registration link click
registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
    adjustImageContainerPosition(); // Call the function to adjust the position when the registration form is activated
});

// Event listener for login link click
loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
    adjustImageContainerPosition(); // Call the function to adjust the position when the login form is activated
});

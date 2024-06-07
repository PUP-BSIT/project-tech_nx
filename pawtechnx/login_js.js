const wrapper = document.querySelector('.wrapper');
const imageContainer = document.querySelector('.image-container');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

function adjustImageContainerPosition() {
    if (wrapper.classList.contains('active')) {
        imageContainer.classList.add('register-active'); 
    } else {
        imageContainer.classList.remove('register-active'); 
    }
}

registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
    adjustImageContainerPosition(); 
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
    adjustImageContainerPosition();
});

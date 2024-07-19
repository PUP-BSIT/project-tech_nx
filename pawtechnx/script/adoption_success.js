document.addEventListener('DOMContentLoaded', () => {
    const continueButton = document.getElementById('continue-button');
    const lastVisitedPage = sessionStorage.getItem('lastVisitedPage') || 'default-pet-page.html'; // Default page if not set

    continueButton.addEventListener('click', () => {
        window.location.href = lastVisitedPage;
    });
});

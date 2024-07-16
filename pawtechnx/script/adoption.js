document.addEventListener('DOMContentLoaded', function() {
    let recentlyViewedPet = sessionStorage.getItem('recently_viewed_pet');

    if (recentlyViewedPet) {
        document.getElementById('pet_interest').value = recentlyViewedPet;
    }
});
document.addEventListener('DOMContentLoaded', function() {
    let alerts = document.getElementsByClassName('php-alert');
    
    for (let i = 0; i < alerts.length; i++) {
        let message = alerts[i].innerHTML.trim();t
        if (message !== '') {
            alert(message);
        }
    }
});

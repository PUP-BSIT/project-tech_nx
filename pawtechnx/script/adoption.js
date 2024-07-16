function setRecentlyViewedPet(petName) {
    console.log('Setting pet name in session storage:', petName);
    sessionStorage.setItem('recently_viewed_pet', petName);
    
    fetch('/php/set_pet_session.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'pet_name=' + encodeURIComponent(petName)
    })
    .then(response => response.text())
    .then(data => console.log('Response from set_pet_session.php:', data))
    .catch(error => console.error('Error:', error));
}

document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM fully loaded and parsed");

    var petInterestField = document.getElementById('pet_interest');
    if (petInterestField) {
        var petName = sessionStorage.getItem('recently_viewed_pet');
        console.log('Pet name from session storage:', petName);
        if (petName) {
            petInterestField.value = petName;
            console.log('Pet name set in input field:', petName); 
        } else {
            console.log('No pet name found in session storage.'); 
        }
    } else {
        console.error('Element with ID "pet_interest" not found.');
    }

    document.querySelectorAll('.adopt-button').forEach(button => {
        button.addEventListener('click', function(event) {
            const petName = event.target.getAttribute('data-pet-name');
            console.log('Button clicked, pet name:', petName);
            setRecentlyViewedPet(petName); 
            if (petInterestField) {
                petInterestField.value = petName; 
            }
            window.location.href = '../php/adoption.php'; 
        });
    });
});

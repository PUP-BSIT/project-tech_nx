function setRecentlyViewedPet(petName) {
    console.log('Setting pet name in session storage:', petName);
    sessionStorage.setItem('recently_viewed_pet', petName);
    
    fetch('../php/set_pet_session.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'pet_name=' + petName
    })
    .then(response => response.text())
    .then(data => console.log('Response from set_pet_session.php:', data))
    .catch(error => console.error('Error:', error));
}

document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM fully loaded and parsed");

    let petInterestField = document.getElementById('pet_interest');
    if (!petInterestField) {
        console.error('Element with ID "pet_interest" not found.');
        return;
    }

    let petName = sessionStorage.getItem('recently_viewed_pet');
    console.log('Pet name from session storage:', petName);
    if (petName) {
        petInterestField.value = petName;
        console.log('Pet name set in input field:', petName); 
    } else {
        console.log('No pet name found in session storage.'); 
    }

    document.querySelectorAll('.adopt-button').forEach(button => {
        button.addEventListener('click', function(event) {
            let petName = event.target.getAttribute('data-pet-name');
            console.log('Button clicked, pet name:', petName);
            setRecentlyViewedPet(petName); 
            
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '../php/adoption.php'; 
            
            let petIdField = document.createElement('input');
            petIdField.type = 'hidden';
            petIdField.name = 'pet_id';
            petIdField.value = event.target.getAttribute('data-pet-id');
            form.appendChild(petIdField);
            
            document.body.appendChild(form);
            form.submit();
        });
    });
});

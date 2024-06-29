function showDetails(petID) {
    fetch('get_pet_details.php?id=' + petID)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data) {
                document.getElementById('modal-body').innerHTML = `
                    <h2>${data.name}</h2>
                    <img src="${data.profile_image}" alt="Image of ${data.name}"
                     style="width: 100%; height: auto;">
                    <p><strong>Age:</strong> ${data.age}</p>
                    <p><strong>Species:</strong> ${data.species}</p>
                    <p><strong>Breed:</strong> ${data.breed}</p>
                    <p><strong>Gender:</strong> ${data.gender}</p>
                `;
                document.getElementById('myModal').style.display = "block";
            } else {
                console.error('No data received from server');
            }
        })
        .catch(error => {
            console.error('Error fetching pet details:', error);
        });
}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
        closeModal();
    }
}

function adoptPet(petID) {
    fetch('check_login_status.php')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.loggedIn) {
                window.location.href = 'adoption_form.php?pet_id=' + petID;
            } else {
                window.location.href = 'login.php';
            }
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
}
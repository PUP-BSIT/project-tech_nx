function showDetails(petID) {
    fetch('get_pet_details.php?id=' + petID)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('modal-body').innerHTML = `
                    <h2>Error</h2>
                    <p>${data.error}</p>`;
                document.getElementById('myModal').classList.add('show');
                return;
            }

            const { profile_img, Name, Age, Species, Breed, Gender, Weight, Height, Description, pet_ID, gallery } = data;

            let modalContent = `
                <div class="pet-profile">
                    <div class="pet-header">
                        <img src="${profile_img || ''}" alt="Image of ${Name || 'undefined'}" class="pet-image">
                        <div class="pet-info">
                            <h2>Hello, I'm ${Name || 'undefined'}!</h2>
                            <p><strong>Age:</strong> ${Age || 'undefined'} years</p>
                            <p><strong>Species:</strong> ${Species || 'undefined'}</p>
                            <p><strong>Breed:</strong> ${Breed || 'undefined'}</p>
                            <p><strong>Gender:</strong> ${Gender || 'undefined'}</p>
                            <p><strong>Weight:</strong> ${Weight || 'undefined'}</p>
                            <p><strong>Height:</strong> ${Height || 'undefined'}</p>
                            <p>${Description || 'I am looking for a home!'}</p>
                            <button id="adoptButton" class="adopt-button" data-pet-id="${pet_ID}" data-pet-name="${Name}">Adopt</button>
                        </div>
                    </div>
                    <h3>My Gallery</h3>
                    <div class="gallery">
            `;

            if (Array.isArray(gallery)) {
                gallery.forEach((imagePath, index) => {
                    modalContent += `<img src="${imagePath}" alt="Gallery image ${index + 1}" class="gallery-image">`;
                });
            }

            modalContent += `
                    </div>
                </div>
            `;

            document.getElementById('modal-body').innerHTML = modalContent;
            document.getElementById('myModal').classList.add('show');

            const adoptButton = document.getElementById('adoptButton');
            adoptButton.addEventListener('click', function(event) {
                const petName = event.target.getAttribute('data-pet-name');
                const petID = event.target.getAttribute('data-pet-id');
                checkLoginAndProceed(petName, petID);
            });
        })
        .catch(error => console.error('Error fetching pet details:', error));
}

function checkLoginAndProceed(petName, petID) {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            if (data.loggedIn) {
                alert("Proceeding to the adoption form");
                sessionStorage.setItem('recently_viewed_pet', petName);
                window.location.href = `../php/adoption.php?pet_id=${petID}&pet_name=${petName}`;
            } else {
                alert("User needs to login before adopting");
                window.location.href = '../html/login.html';
            }
        })
        .catch(error => console.error('Error checking login status:', error));
}

function closeModal() {
    document.getElementById('myModal').classList.remove('show');
}

window.onclick = function(event) {
    if (event.target === document.getElementById('myModal')) {
        closeModal();
    }
};

document.querySelector('.close').addEventListener('click', function() {
    closeModal();
});

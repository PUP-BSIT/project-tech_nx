function showDetails(petID) {
    fetch('get_pet_details.php?id=' + petID)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                document.getElementById('modal-body').innerHTML = `
                    <h2>Error</h2>
                    <p>${data.error}</p>
                `;
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
                            <p><strong>Age:</strong> ${Age || 'undefined'} years old</p>
                            <p><strong>Species:</strong> ${Species || 'undefined'}</p>
                            <p><strong>Breed:</strong> ${Breed || 'undefined'}</p>
                            <p><strong>Gender:</strong> ${Gender || 'undefined'}</p>
                            <p><strong>Weight:</strong> ${Weight || 'undefined'}</p>
                            <p><strong>Height:</strong> ${Height || 'undefined'}</p>
                            <p>${Description || 'I am looking for a home!'}</p>
                            <form id="adoptForm" method="POST" action="adoption.php">
                                <input type="hidden" name="pet_id" value="${pet_ID}">
                                <input type="hidden" name="pet_name" value="${Name}">
                                <button type="submit" class="adopt-button">Adopt</button>
                            </form>
                        </div>
                    </div>
                    <h3>My Gallery</h3>
                    <div class="gallery">`;

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

            fetch('/php/check_login.php')
                .then(response => response.json())
                .then(loginData => {
                    if (!loginData.logged_in) {
                        document.getElementById('adoptForm').addEventListener('submit', function(event) {
                            event.preventDefault();
                            alert('You need to log in first to adopt a pet!');
                            window.location.href = '../html/login.html'; 
                        });
                    }
                })
                .catch(error => console.error('Error checking login status:', error));
        })
        .catch(error => console.error('Error fetching pet details:', error));
}

function closeModal() {
    document.getElementById('myModal').classList.remove('show');
}

window.onclick = function(event) {
    if (event.target === document.getElementById('myModal')) {
        closeModal();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.adopt-button').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const petName = event.target.closest('form').querySelector('input[name="pet_name"]').value;
            sessionStorage.setItem('recently_viewed_pet', petName);
            window.location.href = 'adoption.php';
        });
    });

    let petName = sessionStorage.getItem('recently_viewed_pet');
    if (petName) {
        document.getElementById('pet_interest').value = petName;
    }
});

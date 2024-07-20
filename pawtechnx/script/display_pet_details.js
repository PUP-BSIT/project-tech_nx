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

            const { profile_img, Name, Age, Species, Breed, Gender, Weight, 
                Height, Description, pet_ID, gallery } = data;

            let modalContent = `
            <div class="pet-header">
              <div class="pet-image-container">
                <img src="${profile_img || ''}" alt="Image of ${Name || 
                    'undefined'}" class="pet-image">
              </div>
              <div class="pet-info">
                <h2>Hello, I'm ${Name || 'undefined'}!</h2>
                <p><strong>Age:</strong> ${Age || 'undefined'} years</p>
                <p><strong>Species:</strong> ${Species || 'undefined'}</p>
                <p><strong>Breed:</strong> ${Breed || 'undefined'}</p>
                <p><strong>Gender:</strong> ${Gender || 'undefined'}</p>
                <p><strong>Weight:</strong> ${Weight || 'undefined'} kg</p>
                <p><strong>Height:</strong> ${Height || 'undefined'} inches</p>
                <p>${Description || 'I am looking for a home!'}</p>
                <button id="adoptButton" class="adopt-button" 
                data-pet-id="${pet_ID}" data-pet-name="${Name}">Adopt</button>
              </div>
            </div>
            <div class="gallery">
              <h3>My Gallery</h3>
              <div class="gallery-images">
          `;
          
            if (Array.isArray(gallery)) {
                gallery.forEach((imagePath, index) => {
                    modalContent += `<img src="${imagePath}" 
                    alt="Gallery image ${index + 1}" class="gallery-image" 
                    onclick="openLightbox(${index})">`;
                });
            }
          
            modalContent += `
              </div>
            </div>
          `;
            document.getElementById('modal-body').innerHTML = modalContent;
            document.getElementById('myModal').classList.add('show');

            const adoptButton = document.getElementById('adoptButton');
            if (adoptButton) {
                adoptButton.addEventListener('click', function(event) {
                    const petName = event.target.getAttribute('data-pet-name');
                    const petID = event.target.getAttribute('data-pet-id');
                    checkLoginAndProceed(petName, petID);
                });
            }

            populateGalleryImages(gallery); 
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
                sessionStorage.setItem('lastVisitedPage', window.location.href);
                window.location.href = '../html/login.html';
            }
        })
        .catch(error => console.error('Error checking login status:', error));
}

function closeModal() {
    const modal = document.getElementById('myModal');
    if (modal) {
        modal.classList.remove('show');
    }
}

window.onclick = function(event) {
    const modal = document.getElementById('myModal');
    if (modal && event.target === modal) {
        closeModal();
    }
};

document.querySelector('.close').addEventListener('click', function() {
    closeModal();
});

let currentImageIndex = 0;
const galleryImages = [];

function openLightbox(index) {
    currentImageIndex = index;
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <img src="${galleryImages[index]}" class="lightbox-image" alt="Lightbox Image">
            <span class="lightbox-prev" onclick="changeImage(-1)">&#10094;</span>
            <span class="lightbox-next" onclick="changeImage(1)">&#10095;</span>
            <span class="lightbox-close" onclick="closeLightbox()">&#10005;</span>
        </div>
    `;
    document.body.appendChild(lightbox);
    lightbox.classList.add('show');
}

function changeImage(direction) {
    currentImageIndex += direction;
    if (currentImageIndex < 0) currentImageIndex = galleryImages.length - 1;
    if (currentImageIndex >= galleryImages.length) currentImageIndex = 0;
    const lightboxImage = document.querySelector('.lightbox-image');
    if (lightboxImage) lightboxImage.src = galleryImages[currentImageIndex];
}

function closeLightbox() {
    const lightbox = document.querySelector('.lightbox');
    if (lightbox) {
        lightbox.classList.remove('show'); 
        setTimeout(() => lightbox.remove(), 300); 
    }
}

function populateGalleryImages(gallery) {
    galleryImages.length = 0; 
    if (Array.isArray(gallery)) galleryImages.push(...gallery);
}

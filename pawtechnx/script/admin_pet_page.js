document.addEventListener("DOMContentLoaded", function() {
    const addPetBtn = document.getElementById("addPetBtn");
    const petModal = document.getElementById("petModal");
    const closeModal = document.querySelector(".close");
    const petForm = document.getElementById("petForm");

    if (!addPetBtn || !petModal || !closeModal || !petForm) {
        console.error("One or more essential elements are missing from the DOM");
        return;
    }

    addPetBtn.addEventListener("click", function() {
        petModal.style.display = "block";
        petForm.reset(); 
    });

    closeModal.addEventListener("click", function() {
        petModal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === petModal) {
            petModal.style.display = "none";
        }
    });

    petForm.addEventListener("submit", function(event) {
        event.preventDefault(); 
        const formData = new FormData(petForm);
        fetch("../php/add_pet.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); 
            petModal.style.display = "none"; 
            fetchPets(); 
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });

 
    function fetchPets() {
        fetch("../php/get_pets.php")
            .then(response => response.json())
            .then(data => {
               
            })
            .catch(error => {
                console.error('Error fetching pets:', error);
            });
    }
});

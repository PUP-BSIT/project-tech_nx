document.addEventListener("DOMContentLoaded", function() {
    const petList = document.getElementById("petList");
    const addPetBtn = document.getElementById("addPetBtn");
    const petModal = document.getElementById("petModal");
    const closeModal = document.querySelector(".close");
    const petForm = document.getElementById("petForm");
    const deletePetBtn = document.getElementById("deletePetBtn");

    if (!petList || !addPetBtn || !petModal || !closeModal || !petForm
         || !deletePetBtn) return;
  
    function fetchPets() {
        fetch("get_pets.php")
            .then(function(response) {
            return response.json();
            })
            .then(function(data) {
            petList.innerHTML = '';
            data.forEach(function(pet) {
                    const petItem = document.createElement("div");
                    petItem.classList.add("pet-item");
                    petItem.dataset.id = pet.id;
                    petItem.innerHTML = `
                        <img src="${pet.profile_image}" alt="${pet.name}">
                        <p>${pet.name}</p>
                        <p>${pet.age} years old</p>
                        <p>${pet.species}</p>
                        <p>${pet.breed}</p>
                        <p>${pet.gender}</p>
                        
                    `;
                    petList.appendChild(petItem);
  
                    petItem.addEventListener("click", function() {
                        openModal(pet);
                    });
                });
            })
            .catch(function(error) {
                console.error('Error fetching pets:', error);
            });
    }
  
    function openModal(pet) {
        pet = pet || {};
        petModal.style.display = "block";
        petForm.id.value = pet.id || "";
        petForm.name.value = pet.name || "";
        petForm.age.value = pet.age || "";
        petForm.species.value = pet.species || "";
        petForm.breed.value = pet.breed || "";
        petForm.gender.value = pet.gender || "";
        petForm.profile_image.value = pet.profile_image || "";
        deletePetBtn.style.display = pet.id ? "inline" : "none";
    }
  
    closeModal.addEventListener("click", function() {
        petModal.style.display = "none";
    });
  
    petForm.addEventListener("submit", function(event){
        event.preventDefault();
        const formData = new FormData(petForm);
        const isUpdate = Boolean(formData.get("id"));
        const url = isUpdate ? "update_pet.php" : "add_pet.php";
  
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                alert(data);
                petModal.style.display = 'none';
                fetchPets();
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
});
  
    deletePetBtn.addEventListener('click', function() {
        const petId = petForm.id.valueOf;
        if (confirm("Are you sure you want to delete this pet?")) {
            fetch("delete_pet.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: 'id=' + petId
            })
                .then(function(response) {
                    return response.text();
                })
                .then(function(data) {
                    alert(data);
                    petModal.style.display = 'none';
                    fetchPets();
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        }
    });
  
    addPetBtn.addEventListener("click", function() {
        openModal();
    });
  
    fetchPets();
  });
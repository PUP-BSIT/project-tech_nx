document.addEventListener("DOMContentLoaded", () => {
  const petList = document.getElementById("petList");
  const addPetBtn = document.getElementById("addPetBtn");
  const petModal = document.getElementById("petModal");
  const closeModal = document.querySelector(".close");
  const petForm = document.getElementById("petForm");
  const deletePetBtn = document.getElementById("deletePetBtn");

  function fetchPets() {
      fetch("get_pets.php")
          .then(response => response.json())
          .then(data => {
              petList.innerHTML = "";
              data.forEach(pet => {
                  const petItem = document.createElement("div");
                  petItem.classList.add("pet-item");
                  petItem.dataset.id = pet.id;
                  petItem.innerHTML = `
                      <img src="${pet.profile_image}" alt="${pet.name}">
                      <p>${pet.name}</p>
                      <p>${pet.species}</p>
                      <p>${pet.breed}</p>
                      <p>${pet.age} years old</p>
                  `;
                  petList.appendChild(petItem);

                  petItem.addEventListener("click", () => {
                      openModal(pet);
                  });
              });
          })
          .catch(error => console.error("Error fetching pets:", error));
  }

  function openModal(pet = {}) {
      petModal.style.display = "block";
      petForm.id.value = pet.id || "";
      petForm.name.value = pet.name || "";
      petForm.species.value = pet.species || "";
      petForm.breed.value = pet.breed || "";
      petForm.age.value = pet.age || "";
      petForm.profile_image.value = pet.profile_image || "";
      deletePetBtn.style.display = pet.id ? "inline" : "none";
  }

  closeModal.addEventListener("click", () => {
      petModal.style.display = "none";
  });

  petForm.addEventListener("submit", event => {
      event.preventDefault();
      const formData = new FormData(petForm);
      const isUpdate = Boolean(formData.get("id"));
      const url = isUpdate ? "update_pet.php" : "add_pet.php";

      fetch(url, {
          method: "POST",
          body: formData
      })
      .then(response => response.text())
      .then(data => {
          alert(data);
          petModal.style.display = "none";
          fetchPets();
      })
      .catch(error => console.error("Error:", error));
  });

  deletePetBtn.addEventListener("click", () => {
      const petId = petForm.id.value;
      if (confirm("Are you sure you want to delete this pet?")) {
          fetch("delete_pet.php", {
              method: "POST",
              headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
              },
              body: `id=${petId}`
          })
          .then(response => response.text())
          .then(data => {
              alert(data);
              petModal.style.display = "none";
              fetchPets();
          })
          .catch(error => console.error("Error:", error));
      }
  });

  addPetBtn.addEventListener("click", () => {
      openModal();
  });

  fetchPets();
});
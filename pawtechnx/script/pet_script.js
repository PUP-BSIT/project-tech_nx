document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    const modalClose = document.querySelector(".close");
    const petImages = document.querySelectorAll(".pet-image img");
    const adoptButton = document.getElementById("adopt_button");
  
    function handleImageClick(image, index) {
      modal.style.display = "block";
  
      const modalImage = document.getElementById("modal_image");
      modalImage.src = image.src; 

      const petName = image.getAttribute("data-name");

      const modalDetails = document.getElementById("modal_details");
      modalDetails.innerHTML = "<h2>Details about " + petName + "</h2>" +
        "<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>" +
        "<p>Age: 1 year old</p>" +
        "<p>Breed: </p>";
      adoptButton.setAttribute("data-pet-name", petName);
    }
  
    for (let i = 0; i < petImages.length; i++) {
      petImages[i].addEventListener("click", function () {
        handleImageClick(petImages[i], i);
      });
    }

    function closeModal() {
      modal.style.display = "none";
    }
  
    modalClose.addEventListener("click", closeModal);
  
    function closeOutsideModal(event) {
      if (event.target === modal) {
        closeModal(); 
      }
    }
  
    window.addEventListener("click", closeOutsideModal);

    adoptButton.addEventListener("click", function(){
      const petName = this.getAttribute("data-pet-name");
      window.location.href = 'adoption_form.html?pet=${encodeURIComponent(petName)}';
    })
  });
  
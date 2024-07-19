document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const alertBox = document.querySelector('.alert');

  form.addEventListener('submit', function(event) {
      event.preventDefault();

      const formData = new FormData(form);
      const pet_ID = new URLSearchParams(window.location.search).get('pet_ID');

      fetch(`update_pet.php?pet_ID=${pet_ID}`, {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(data => {
          if (data.message) {
              alertBox.textContent = data.message;
              alertBox.style.color = 'green';
          } else if (data.error) {
              alertBox.textContent = data.error;
              alertBox.style.color = 'red';
          }
      })
      .catch(error => {
          alertBox.textContent = 'An error occurred. Please try again.';
          alertBox.style.color = 'red';
      });
  });
});
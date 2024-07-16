function validateForm(event) {
  event.preventDefault(); 

  let fname = document.getElementById('fname').value.trim();
  let lname = document.getElementById('lname').value.trim();
  let username = document.getElementById('username').value.trim();
  let contact = document.getElementById('contact').value.trim();
  let email = document.getElementById('email').value.trim();
  let address = document.getElementById('address').value.trim();
  let salary = document.getElementById('salary').value.trim();
  let password = document.getElementById('password').value;
  let confirm = document.getElementById('confirm').value;

  if (fname === '' || lname === '' || username === '' || contact === '' || email === '' || address === '' || salary === '' || password === '' || confirm === '') {
    alert('Please fill in all fields.');
    return false;
  }

  if (password !== confirm) {
    alert('Passwords do not match.');
    return false;
  }

  // Create a form data object
  let formData = new FormData();
  formData.append('fname', fname);
  formData.append('lname', lname);
  formData.append('username', username);
  formData.append('contact', contact);
  formData.append('email', email);
  formData.append('address', address);
  formData.append('salary', salary);
  formData.append('password', password);

  fetch('../php/registration.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    } else {
      throw new Error('Network response was not ok.');
    }
  })
  .then(data => {
    alert('New record added successfully');
    window.location.href = '../php/home_page.php';
  })
  .catch(error => {
    alert('Error: ' + error.message);
  });
}
